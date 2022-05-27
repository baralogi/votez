<?php

namespace Tests\Feature\Committee\User;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserTest extends TestCase
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

    public function test_user_edit_screen_can_be_rendered()
    {

        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($auth->users[0]);
        $this->get("/committee/user/{$auth->users[0]->id}/edit")
            ->assertOk();
    }

    public function test_can_update_user_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'name' => 'Sapardi Nashir',
            'roles' => 'ketua panitia',
        ];

        $this->actingAs($auth->users[0]);
        $this->put("/committee/user/{$auth->users[0]->id}", $data)
            ->assertSessionHasNoErrors('name', 'roles')
            ->assertRedirect('/committee/user');

        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
        ]);
    }

    public function test_cant_update_user_with_invalid_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $data = [
            'name' => 'Nas',
            'roles' => 'pendemo',
        ];

        $this->actingAs($auth->users[0]);
        $this->put("/committee/user/{$auth->users[0]->id}", $data)
            ->assertSessionHasErrors([
                'name', 'roles'
            ]);;
    }
}
