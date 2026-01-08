<?php

namespace App\Actions\AI;

use App\Enums\AI\ImageAspectRatio;
use App\Enums\AI\RequestType;
use App\Jobs\AI\GenerateCampaignCoverImageJob;
use App\Models\Campaign;
use App\Services\KieaiService;
use Filament\Notifications\Notification;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateCampaignCoverImage
{
    use AsAction;
    
    public function handle(int $campaignId)
    {
        try {
            $campaign = Campaign::findOrFail($campaignId);
            $description = strip_tags($campaign->description);
            $prompt = "Generate a cover image for the Dungeon and Dragon campaign titled '{$campaign->name}'";
            $prompt .= " The style should be artsy. Here is the description of the campaign {$description}";
            
            $service = app()->make(KieaiService::class);
            $result = $service->prompt($prompt)
                ->data($campaign)
                ->aspectRatio(ImageAspectRatio::ThreeTwo)
                ->requestType(RequestType::CampaignCoverImageGeneration)
                ->generateImage();

            GenerateCampaignCoverImageJob::dispatch($result)->delay(60);
            
            Notification::make()
                ->title('Generating Campaign Cover Image')
                ->body('Please wait while we generate your campaign cover image, estimated time: 1-2 minutes.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title("We are unable to generate your campaign cover image")
                ->body("Don't worry, we'll try again later.")
                ->danger()
                ->send();
        }
    }
}
