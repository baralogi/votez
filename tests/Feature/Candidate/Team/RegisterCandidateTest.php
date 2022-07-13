<?php

namespace Tests\Feature\Candidate\Team;

use App\Models\Organization;
use App\Models\User;
use App\Models\Voting;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterCandidateTest extends TestCase
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

    public function test_register_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_candidates_can_registered_using_the_register_screen()
    {
        Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        Voting::factory()->create();

        $data = $this->post('/register', [
            'name' => 'Sebastianus Sembara',
            'email' => '17410100054@dinamika.ac.id',
            'password' => 'password',
            'password_confirmation' => 'password',
            'organization_id' => 1,
            'voting_id' => 1
        ])->assertSessionHasNoErrors('name', 'email', 'password');
    }
}
