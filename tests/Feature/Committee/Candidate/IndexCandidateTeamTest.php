<?php

namespace Tests\Feature\Committee\Candidate;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexCandidateTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_candidate_partner_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
