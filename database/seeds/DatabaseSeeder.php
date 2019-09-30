<?php

use App\Category;
use App\Event;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = Category::pluck('id')->all();

        foreach (range(1, 30) as $key => $value) {
            factory(Event::class)->create([
                'category_id' => collect($categories)->random()
            ]);
        }
    }
}
