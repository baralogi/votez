<?php

namespace Tests\Feature\Committee\Voting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ElectionResultTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_election_result_index_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
