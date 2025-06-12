<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'News']);
        Category::create(['name' => 'Guide']);
        Category::create(['name' => 'Infographic']);
        Category::create(['name' => 'Interview']);
        Category::create(['name' => 'Comparison']);
        Category::create(['name' => 'Business']);
        Category::create(['name' => 'Opinion']);
        Category::create(['name' => 'Review']);
        Category::create(['name' => 'Analysis']);
        Category::create(['name' => 'Feature']);
    }
}
