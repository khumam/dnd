<?php

namespace App\Jobs\AI;

use App\Enums\AI\RequestStatus;
use App\Models\AiRequestLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RetryFailedGenerateCharacterImageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $aiRequestLogs = AiRequestLog::where("status", RequestStatus::Failed->value)->get();

        foreach ($aiRequestLogs as $aiRequestLog) {
            $aiRequestLog->update(['status' => RequestStatus::Pending]);
            GenerateCharacterImageJob::dispatch($aiRequestLog)->delay(30);
        }
    }
}
