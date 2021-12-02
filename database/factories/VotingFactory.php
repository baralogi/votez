<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VotingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'start_at' => Carbon::now(),
            'end_at' => Carbon::now()->addDays(3),
        ];
    }
}
