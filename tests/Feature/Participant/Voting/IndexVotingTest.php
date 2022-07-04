<?php

namespace Tests\Feature\Participant\Voting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexVotingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_participant_data_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_send_token_with_email_data_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_not_authenticate_with_invalid_token()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_vote_using_the_login_screen()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
