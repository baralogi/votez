<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserCandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ryan Ardito Zahwan Ragazzo',
            'organization_id' => 1,
            'email' => 'me@ryan.xyz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->syncRoles(['kandidat']);

        User::create([
            'name' => 'Lavepian Dian Wirayudha',
            'organization_id' => 1,
            'email' => 'me@pian.xyz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->syncRoles(['kandidat']);

        User::create([
            'name' => 'Dian Ayu Palapa Putri',
            'organization_id' => 1,
            'email' => 'me@dian.xyz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->syncRoles(['kandidat']);
    }
}
