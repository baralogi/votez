<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::insert([
            [
                'user_id' => 1,
                'candidate_partner_id' => 1,
                'name' => 'Ryan Ardito Zahwan Ragazzo',
            ],
            [
                'candidate_partner_id' => 1,
                'name' => 'Alicia',
            ]
        ]);
    }
}
