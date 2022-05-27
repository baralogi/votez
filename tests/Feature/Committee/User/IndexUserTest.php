<?php

namespace Tests\Feature\Committee\User;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexUserTest extends TestCase
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

    public function test_user_index_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get('/committee/user')
            ->assertOk();
    }
}
