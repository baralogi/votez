<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'faculty_id' => 1,
                'name' => 'S1 Sistem Informasi'
            ],
            [
                'faculty_id' => 1,
                'name' => 'S1 Teknik Komputer'
            ],
            [
                'faculty_id' => 1,
                'name' => 'D3 Sistem Informasi'
            ],
            [
                'faculty_id' => 2,
                'name' => 'S1 Akuntansi'
            ],
            [
                'faculty_id' => 2,
                'name' => 'S1 Manajemen'
            ],
            [
                'faculty_id' => 2,
                'name' => 'D3 Administrasi Perkantoran'
            ],
            [
                'faculty_id' => 3,
                'name' => 'S1 Desain Komunikasi Visual'
            ],
            [
                'faculty_id' => 3,
                'name' => 'S1 Desain Produk'
            ],
            [
                'faculty_id' => 3,
                'name' => 'D4 Produksi Film dan Televisi'
            ]
        ];
        Major::insert($data);
    }
}
