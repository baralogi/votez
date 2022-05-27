<?php

namespace Tests\Feature\Committee\User;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyUserTest extends TestCase
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

    public function test_can_destroy_user_data()
    {
        $auth = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($auth->users[0]);
        $this->assertDatabaseHas('users', [
            'id' => $auth->users[0]->id,
        ]);
        $this->delete("/committee/user/{$auth->users[0]->id}")
            ->assertRedirect('/committee/user');

        $this->assertDatabaseMissing('users', [
            'name' => $auth->users[0]->name,
        ]);
    }
}
