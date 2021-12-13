<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(5);
        $slug = Str::slug($title, '-');

        return [
            'title' => $title,
            'description' => $this->faker->realText($maxNbChars = 400, $indexSize = 2),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'slug' => $slug,
            'status' => Blog::PUBLISHED
        ];
    }
}
