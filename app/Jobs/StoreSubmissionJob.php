<?php

namespace App\Jobs;

use App\DTO\SubmissionData;
use App\Services\SubmissionService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class StoreSubmissionJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected SubmissionData $data
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $submissionService = new SubmissionService();
            $submissionService->create($this->data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
