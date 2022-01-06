<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl,
            'category_id' => $this->faker->numberBetween(1, 3),
            'content' => $this->faker->paragraph,
            'is_headline' => $this->faker->numberBetween(0, 1),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
