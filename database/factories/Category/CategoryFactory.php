<?php

namespace Database\Factories\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(2, true),
        ];
    }
}
