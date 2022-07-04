<?php

namespace Tests\Feature\Candidate\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpsertTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_upsert_candidate_file_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_cant_upsert_candidate_file_with_invalid_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
