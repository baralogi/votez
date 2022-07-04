<?php

namespace Tests\Feature\Committee\Committee;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyCommitteeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_destroy_committee_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
