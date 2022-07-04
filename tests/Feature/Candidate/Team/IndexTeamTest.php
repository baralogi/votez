<?php

namespace Tests\Feature\Candidate\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_team_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
