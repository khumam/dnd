<?php

namespace App\Jobs\AI;

use App\Enums\AI\RequestStatus;
use App\Enums\AI\RequestType;
use App\Models\AiRequestLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RetryFailedGenerateCampaignCoverImageJob implements ShouldQueue
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
        $aiRequestLogs = AiRequestLog::where("status", RequestStatus::Failed->value)
            ->where('type', RequestType::CampaignCoverImageGeneration->value)
            ->get();

        foreach ($aiRequestLogs as $aiRequestLog) {
            $aiRequestLog->update(['status' => RequestStatus::Pending]);
            GenerateCampaignCoverImageJob::dispatch($aiRequestLog)->delay(30);
        }
    }
}
