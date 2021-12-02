<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Voting;
use Illuminate\Database\Seeder;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voting::factory()
            ->count(3)
            ->has(Candidate::factory()->count(3))
            ->create();
    }
}
