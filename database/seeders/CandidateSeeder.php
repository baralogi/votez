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
                'user_id' => 4,
                'candidate_partner_id' => 1,
                'name' => 'Ryan Ardito Zahwan Ragazzo',
                'status' => 'KETUA'
            ],
            [
                'user_id' => NULL,
                'candidate_partner_id' => 1,
                'name' => 'Alicia',
                'status' => 'WAKIL KETUA'
            ],
            [
                'user_id' => 5,
                'candidate_partner_id' => 2,
                'name' => 'Lavepian Dian Wirayudha',
                'status' => 'KETUA'
            ],
            [
                'user_id' => NULL,
                'candidate_partner_id' => 2,
                'name' => 'Nazila Masyrifaini',
                'status' => 'WAKIL KETUA'
            ],
            [
                'user_id' => 6,
                'candidate_partner_id' => 3,
                'name' => 'Dian Ayu Palapa Putri',
                'status' => 'KETUA'
            ],
            [
                'user_id' => 7,
                'candidate_partner_id' => 4,
                'name' => 'Mahardika Alamsyah Singgih',
                'status' => 'KETUA'
            ],
            [
                'user_id' => 8,
                'candidate_partner_id' => 5,
                'name' => 'Irvan Alfaridzi Dwi Prastowo',
                'status' => 'KETUA'
            ]
        ]);
    }
}
