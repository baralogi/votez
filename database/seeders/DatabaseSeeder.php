<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            OrganizationSeeder::class,
            UserCommitteeSeeder::class,
            UserCandidateSeeder::class,
            VotingSeeder::class,
            CandidatePartnerSeeder::class,
            CandidateSeeder::class,
            FacultySeeder::class,
            MajorSeeder::class
        ]);
    }
}
