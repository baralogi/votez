<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identification_number' => $this->faker->isbn10(),
            'name' => $this->faker->name(),
            'have_voted' => false,
        ];
    }
}
