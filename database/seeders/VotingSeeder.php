<?php

namespace Database\Seeders;

use App\Models\Voting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Voting::insert([
            [
                'organization_id' => 1,
                'name' => 'Badan Eksekutif Mahasiswa',
                'description' => 'Pemilihan ketua dan wakil ketua Badan Eksekutif Mahasiswa Universitas Dinamika',
                'start_at' => Carbon::now(),
                'end_at' => Carbon::now()->addDays(3),
            ],
            [
                'organization_id' => 1,
                'name' => 'Dewan Perwakilan Mahasiswa',
                'description' => 'Pemilihan ketua dan wakil ketua Dewan Perwakilan Mahasiswa Universitas Dinamika',
                'start_at' => Carbon::now(),
                'end_at' => Carbon::now()->addDays(3),
            ]
        ]);
    }
}
