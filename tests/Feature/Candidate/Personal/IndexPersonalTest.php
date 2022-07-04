<?php

namespace Tests\Feature\Candidate\Personal;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPersonalTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_candidate_file_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
