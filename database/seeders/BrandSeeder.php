<?php

namespace Database\Seeders;

use App\Models\Brand\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::factory(10)->create();
    }
}
