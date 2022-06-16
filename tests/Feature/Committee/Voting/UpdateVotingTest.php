<?php

namespace Tests\Feature\Committee\Voting;

use App\Models\Organization;
use App\Models\User;
use App\Models\Voting;
use Carbon\Carbon;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateVotingTest extends TestCase
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

    public function test_voting_edit_screen_can_be_rendered()
    {

        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $voting = Voting::factory()
            ->create();

        $this->actingAs($auth->users[0]);
        $this->get("/committee/voting/{$voting->id}/edit")
            ->assertOk();
    }

    public function test_can_update_voting_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $voting = Voting::factory()
            ->create();

        $data = [
            'name' => 'PEMIRA BEM DAN DPM',
            'description' => 'Pemilihan ketua BEM dan DPM Universitas Dinamika',
            'start_at' => Carbon::now(),
            'end_at' => Carbon::now()->addDays(3)
        ];

        $this->actingAs($auth->users[0]);
        $this->put("/committee/voting/{$voting->id}", $data)
            ->assertSessionHasNoErrors('name', 'description')
            ->assertRedirect('/committee/voting');

        $this->assertDatabaseHas('votings', [
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public function test_cant_update_voting_with_invalid_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $voting = Voting::factory()
            ->create();

        $data = [
            'name' => 'vote',
            'description' => 12312312312,
            'start_at' => 'hari ini',
            'end_at' => 'besok'
        ];

        $this->actingAs($auth->users[0]);
        $this->put("/committee/voting/{$voting->id}", $data)
            ->assertSessionHasErrors([
                'name', 'description', 'start_at', 'end_at'
            ]);;
    }
}
