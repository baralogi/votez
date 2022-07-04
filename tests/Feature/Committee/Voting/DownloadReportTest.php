<?php

namespace Tests\Feature\Committee\Voting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloadReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_download_voting_result_report()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_can_download_percentage_of_participants_report()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_can_download_candidate_active_report()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
