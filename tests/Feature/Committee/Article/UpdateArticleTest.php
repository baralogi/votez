<?php

namespace Tests\Feature\Committee\Article;

use App\Models\Organization;
use App\Models\Participant;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
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

    public function test_article_edit_screen_can_be_rendered()
    {
    }

    public function test_can_update_article_data()
    {
    }

    public function test_cant_update_article_with_invalid_data()
    {
    }
}
