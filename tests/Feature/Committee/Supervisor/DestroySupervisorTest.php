<?php

namespace Tests\Feature\Committee\Supervisor;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroySupervisorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_destroy_supervisor_data()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
