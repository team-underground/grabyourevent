<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 30)->create()->each(function ($event) {
            $array = ['Best Music', 'Great Audience', 'Foods'];
            $values = Arr::random($array, rand(1, 3));
            $event->attachTags($values);
        });
    }
}
