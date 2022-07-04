<?php

namespace Tests\Feature\Committee\Committee;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexCommitteeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_committee_index_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
