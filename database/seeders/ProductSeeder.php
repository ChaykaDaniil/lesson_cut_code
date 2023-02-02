<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        Product::factory(30)
            ->has(Category::factory())
            ->create();
    }
}
