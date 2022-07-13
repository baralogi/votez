<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Participant::create([
            'name' => 'Akun Peserta',
            'organization_id' => 1,
            'identity_number' => '17410100054',
            'have_voted' => false,
        ]);
    }
}
