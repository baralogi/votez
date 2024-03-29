<?php

namespace Tests\Feature\Committee\Participant;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreParticipantTest extends TestCase
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

    public function test_participant_create_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get('/committee/participant/create')
            ->assertStatus(200);
    }

    public function test_can_store_participant_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'identity_number' => '17410100054',
            'name' => "Lidya Ananda",
        ];

        $this->actingAs($auth->users[0]);
        $this->post('committee/participant', $data)
            ->assertSessionHasNoErrors('identity_number', 'name')
            ->assertRedirect('/committee/participant');

        $this->assertDatabaseHas('participants', [
            'identity_number' => $data['identity_number'],
            'name' => $data['name']
        ]);
    }

    public function test_cant_store_participant_with_invalid_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'identity_number' => 17410100054,
            'name' => "Lid",
        ];

        $this->actingAs($auth->users[0]);
        $this->post('/committee/participant', $data)
            ->assertSessionHasErrors([
                'identity_number', 'name'
            ]);;
    }
}
