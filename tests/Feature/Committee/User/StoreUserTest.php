<?php

namespace Tests\Feature\Committee\User;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreUserTest extends TestCase
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

    public function test_user_create_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get('/committee/user/create')
            ->assertStatus(200);
    }

    public function test_can_store_user_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'name' => 'Sapardi Nashir',
            'email' => 'sapardi@gmail.com',
            'roles' => 'ketua panitia',
        ];

        $this->actingAs($auth->users[0]);
        $this->post('/committee/user', $data)
            ->assertSessionHasNoErrors('name', 'email', 'roles')
            ->assertRedirect('/committee/user');

        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function test_cant_store_user_with_invalid_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'name' => 'Nas',
            'email' => 'emailmiliksapardi',
            'roles' => 'pendemo',
        ];

        $this->actingAs($auth->users[0]);
        $this->post('/committee/user', $data)
            ->assertSessionHasErrors([
                'name', 'email', 'roles'
            ]);;
    }
}
