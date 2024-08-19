<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class SubmissionData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $message
    ) {
    }
}
