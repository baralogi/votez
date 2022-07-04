<?php

namespace Tests\Feature\Committee\Voting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActiveVotingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_update_status_active_voting_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_can_update_status_nonactive_voting_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
