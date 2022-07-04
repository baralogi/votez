<?php

namespace Tests\Feature\Candidate\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterCandidateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_candidates_can_registered_using_the_register_screen()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
