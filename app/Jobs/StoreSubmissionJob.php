<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Models\Submission;
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
        protected array $data
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $submission = Submission::query()->create($this->data);
            SubmissionSaved::dispatch($submission);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
