<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::insert([
            [
                'name' => 'FAKULTAS TEKNOLOGI DAN INFORMATIKA'
            ],
            [
                'name' => 'FAKULTAS EKONOMI DAN BISNIS'
            ],
            [
                'name' => 'FAKULTAS DESAIN DAN INDUSTRI KREATIF'
            ]
        ]);
    }
}
