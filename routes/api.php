<?php

use App\Http\Api\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::post('/submit', [SubmissionController::class, 'store']);
