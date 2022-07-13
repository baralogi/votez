<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
            [
                'nim' => '17410100001',
                'name' => 'Irvan Alfaridzi',
                'major' => 'S1 Sistem Informasi',
                'sskm_point' => '140',
                'ipk' => '4.00',
            ],
            [
                'nim' => '17410100002',
                'name' => 'Nashir Jamali',
                'major' => 'S1 Sistem Informasi',
                'sskm_point' => '120',
                'ipk' => '3.00',
            ],
            [
                'nim' => '17410100003',
                'name' => 'Denandra Prasetya',
                'major' => 'S1 Sistem Informasi',
                'sskm_point' => '120',
                'ipk' => '3.50',
            ],
        ]);
    }
}
