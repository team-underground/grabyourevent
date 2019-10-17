<?php

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Music', 'Concerts', 'Plays', 'Exhibitions', 'Sports', 'Careers & Bussiness', 'Learning', 'For Kids', 'Outdoor & Adventures', 'Arts', 'Food & Drinks', 'Health & Fitness'];

        foreach ($categories as $key => $category) {
            factory(Category::class)
                ->create(['category_name' => Str::upper($category)]);
        }
    }
}
