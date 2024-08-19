<?php

namespace Tests\Feature;

use App\Events\SubmissionSaved;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSubmissionIsStoredAndEventIsFired()
    {
        Event::fake();

        $submissionData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ];

        $response = $this->postJson('/api/submit', $submissionData);

        $response->assertSuccessful();

        Event::assertDispatched(SubmissionSaved::class);

        $this->assertDatabaseHas('submissions', $submissionData);
    }
}
