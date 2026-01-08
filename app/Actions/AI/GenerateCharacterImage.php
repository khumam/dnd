<?php

namespace App\Actions\AI;

use App\Enums\AI\ImageAspectRatio;
use App\Enums\AI\RequestType;
use App\Jobs\AI\GenerateCharacterImageJob;
use App\Models\Character;
use App\Services\KieaiService;
use Filament\Notifications\Notification;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateCharacterImage
{
    use AsAction;

    /**
     * Generate a character image using AI.
     * 
     * @param int $characterId The ID of the character to generate an image for.
     * @return void
     */
    public function handle(int $characterId): void
    {
        try {
            $character = Character::with(["characterStatistics", "characterSkills"])->findOrFail($characterId);
            $appearanceVariable = ["race", "class", "alignment", "gender", "age", "height", "weight", "eyes", "hair", "skin", "equipment", "proficiencies"];
            $statisticVariable = ["strength", "dexterity", "constitution", "intelligence", "wisdom", "charisma"];
            $characterStatistics = collect($character->characterStatistics->only($statisticVariable))
                ->map(fn($value, $key) => str_replace("_", " ", ucfirst($key) . ": " . $value))
                ->implode(", ");
            $characterAppearance = collect($character->only($appearanceVariable))
                ->map(fn($value, $key) => ucfirst($key) . ": " . (is_array($value) ? implode(", ", $value) : $value))
                ->implode(", ");
            $prompt = "Create only the portrait of a Dungeon and Dragon character image without any attributes on image and no transparent background for {$character->name}, appearance {$characterAppearance} with the following attributes: {$characterStatistics}";
            $prompt .= " .The style of the character is artsy, elegant, and detailed.";
            
            $service = app()->make(KieaiService::class);
            $result = $service->prompt($prompt)
                ->data($character)
                ->aspectRatio(ImageAspectRatio::ThreeTwo)
                ->requestType(RequestType::CharacterImageGeneration)
                ->generateImage();

            GenerateCharacterImageJob::dispatch($result)->delay(60);

            Notification::make()
                ->title('Generating Character Image')
                ->body('Please wait while we generate your character image, estimated time: 1-2 minutes.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title("We are unable to generate your character image")
                ->body("Don't worry, we'll try again later.")
                ->danger()
                ->send();
        }
    }
}
