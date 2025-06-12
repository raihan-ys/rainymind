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
        Category::create([
            'name' => 'News',
            'description' => 'Latest updates and news articles.',
        ]);
        Category::create([
            'name' => 'Guide',
            'description' => 'Comprehensive guides and how-tos.',
        ]);
        Category::create([
            'name' => 'Infographic',
            'description' => 'Visual representations of data and information.',
        ]);
        Category::create([
            'name' => 'Tutorial',
            'description' => 'Step-by-step tutorials on various topics.',
        ]);
        Category::create([
            'name' => 'Review',
            'description' => 'In-depth reviews of products and services.',
        ]);
        Category::create([
            'name' => 'Opinion',
            'description' => 'Personal opinions and editorial pieces.',
        ]);
        Category::create([
            'name' => 'Announcement',
            'description' => 'Official announcements and updates.',
        ]);
        Category::create([
            'name' => 'Event',
            'description' => 'Information about upcoming events and activities.',
        ]);
        Category::create([
            'name' => 'Other',
            'description' => 'Miscellaneous articles that do not fit into other categories.',
        ]);
        Category::create([
            'name' => 'Uncategorized',
            'description' => 'Articles that have not been categorized yet.',
        ]);
        Category::create([
            'name' => 'Featured',
            'description' => 'Highlighted articles that are of special interest.',
        ]);
        Category::create([
            'name' => 'Popular',
            'description' => 'Articles that are currently trending or popular.',
        ]);
        Category::create([
            'name' => 'Archived',
            'description' => 'Older articles that are no longer actively updated.',
        ]);
        Category::create([
            'name' => 'Sponsored',
            'description' => 'Articles that are sponsored by advertisers.',
        ]);
        Category::create([
            'name' => 'Community',
            'description' => 'Articles contributed by the community.',
        ]);
    }
}
