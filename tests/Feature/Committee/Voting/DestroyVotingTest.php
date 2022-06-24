<?php

namespace Tests\Feature\Committee\Voting;

use App\Models\Organization;
use App\Models\User;
use App\Models\Voting;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DestroyVotingTest extends TestCase
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

    public function test_can_destroy_voting_data()
    {
        Storage::fake('images');
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $voting = Voting::factory()
            ->create();

        $this->actingAs($auth->users[0]);
        $this->assertDatabaseHas('votings', [
            'id' => $voting->id,
        ]);
        $this->delete("/committee/voting/{$voting->id}")
            ->assertRedirect('/committee/voting');

        $this->assertDatabaseMissing('votings', [
            'id' => $voting->id,
        ]);
    }
}
