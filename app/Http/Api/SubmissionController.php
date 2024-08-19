<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;
use App\Jobs\StoreSubmissionJob;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    public function store(StoreSubmissionRequest $request): JsonResponse
    {
        StoreSubmissionJob::dispatch($request->validated());

        return response()->json('Success!');
    }
}
