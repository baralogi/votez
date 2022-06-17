<?php

namespace Tests\Feature\Committee\User;

use App\Models\Organization;
use App\Models\Participant;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateParticipantTest extends TestCase
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

    public function test_participant_edit_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->has(Participant::factory(), 'participants')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get("/committee/participant/{$data->participants[0]->id}/edit")
            ->assertOk();
    }

    public function test_can_update_participant_data()
    {
        $organization = Organization::factory()
            ->has(User::factory(), 'users')
            ->has(Participant::factory(), 'participants')
            ->create();

        $data = [
            'identity_number' => '17410100054',
            'name' => "Lidya Ananda",
        ];

        $this->actingAs($organization->users[0]);
        $this->put("/committee/participant/{$organization->participants[0]->id}", $data)
            ->assertSessionHasNoErrors('identity_number', 'name')
            ->assertRedirect('/committee/participant');

        $this->assertDatabaseHas('participants', [
            'identity_number' => $data['identity_number'],
            'name' => $data['name'],
        ]);
    }

    public function test_cant_update_identity_with_invalid_data()
    {
        $organization = Organization::factory()
            ->has(User::factory(), 'users')
            ->has(Participant::factory(), 'participants')
            ->create();

        $data = [
            'identity_number' => 17410100054,
            'name' => "Lid",
        ];

        $this->actingAs($organization->users[0]);
        $this->put("/committee/participant/{$organization->participants[0]->id}", $data)
            ->assertSessionHasErrors([
                'identity_number', 'name'
            ]);;
    }
}
