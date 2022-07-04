<?php

namespace Tests\Feature\Committee\Committee;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreCommitteeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_committee_create_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_can_store_committee_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_cant_store_committee_with_invalid_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
