<?php

namespace Tests\Feature\Auth;

use App\Models\Organization;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Sets up the tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $response = $this->post('/login', [
            'email' => $data->users[0]->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::COMMITTEE);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->post('/login', [
            'email' => $data->users[0]->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
