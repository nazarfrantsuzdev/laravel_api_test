<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testSubmissionEndpoint()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'message' => $this->faker->sentence,
        ];

        $response = $this->postJson('/api/submit', $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Submission received and will be processed.']);

        $this->assertDatabaseHas('submissions', $data);
    }
}
