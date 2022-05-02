<?php

namespace Tests\Feature\Committee\Voting;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewVotingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Sets up the tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_voting_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get('/committee/voting')
            ->assertStatus(200);
    }
}
