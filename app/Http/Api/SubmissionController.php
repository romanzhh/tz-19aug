<?php

namespace App\Http\Api;

use App\DTO\SubmissionData;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Jobs\StoreSubmissionJob;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    public function store(StoreSubmissionRequest $request): JsonResponse
    {
        $submissionData = SubmissionData::from($request);
        StoreSubmissionJob::dispatch($submissionData);
        return response()->json('Success!');
    }
}
