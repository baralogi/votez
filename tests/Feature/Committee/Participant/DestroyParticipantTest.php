<?php

namespace Tests\Feature\Committee\Voting;

use App\Models\Organization;
use App\Models\Participant;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DestroyParticipantTest extends TestCase
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

    public function test_can_destroy_participant_data()
    {
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->has(Participant::factory(), 'participants')
            ->create();

        $this->actingAs($data->users[0]);
        $this->assertDatabaseHas('participants', [
            'id' => $data->participants[0]->id,
        ]);
        $this->delete("/committee/participant/{$data->participants[0]->id}")
            ->assertRedirect('/committee/participant');

        $this->assertDatabaseMissing('participants', [
            'id' => $data->participants[0]->id,
        ]);
    }
}
