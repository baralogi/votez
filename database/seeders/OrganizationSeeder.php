<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Organization;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::factory()
            ->count(1)
            ->has(User::factory()
                ->has(Blog::factory()
                    ->count(5))->count(2))
            ->has(Participant::factory()->count(20))
            ->create();
    }
}
