<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Riza Fahmi',
            'organization_id' => 1,
            'email' => 'me@fahmi.xyz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->syncRoles(['pengawas']);
    }
}
