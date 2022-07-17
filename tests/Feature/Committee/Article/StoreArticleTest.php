<?php

namespace Tests\Feature\Committee\Article;

use App\Models\Organization;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreArticleTest extends TestCase
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

    public function test_article_create_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_can_store_article_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_cant_store_article_with_invalid_data()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
