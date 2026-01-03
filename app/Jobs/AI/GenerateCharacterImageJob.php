<?php

namespace App\Jobs\AI;

use App\Models\AiRequestLog;
use App\Models\User;
use App\Services\KieaiService;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateCharacterImageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public AiRequestLog $aiRequestLog) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::findOrFail($this->aiRequestLog->user_id);

        try {
            $service = app()->make(KieaiService::class);
            $result = $service->getTaskStatus($this->aiRequestLog);
            if ($result) {
                Notification::make()
                    ->title('Image Generated')
                    ->body('Your image has been generated, Please reload the page.')
                    ->sendToDatabase($user);
            } else {
                GenerateCharacterImageJob::dispatch($this->aiRequestLog)->delay(30);
            }
        } catch (\Exception $e) {
            RetryFailedGenerateCharacterImageJob::dispatch();
            Notification::make()
                ->title('Image Generation Failed')
                ->body('An error occurred while generating your image, please try again later.')
                ->sendToDatabase($user);
        }
    }
}
