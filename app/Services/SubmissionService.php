<?php

namespace App\Services;

use App\DTO\SubmissionData;
use App\Events\SubmissionSaved;
use App\Models\Submission;

class SubmissionService
{
    public function create(SubmissionData $data): Submission
    {
        $submission = Submission::query()->create($data->toArray());
        SubmissionSaved::dispatch($submission);
        return $submission;
    }
}
