<?php

namespace Database\Factories\Product;

use App\Models\Brand\Brand;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(2, true)),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'thumbnail' => $this->faker->imageLocal('products'),
            'price' => $this->faker->numberBetween(10, 2000000)
        ];
    }
}
