<?php

namespace Database\Factories\Brand;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
//            'title' => $this->faker->company(),
            'title' => 'Alfa',
            'thumbnail' => $this->faker->imageLocal('brands'),
        ];
    }
}
