<?php

namespace Database\Factories\Story;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'key' => $this->faker->unique()->word,
            'label' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}
