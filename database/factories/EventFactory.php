<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Event;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Event::class, function (Faker $faker) {
    return [
        "uuid" => $faker->uuid,
        "event_name" => $event_name = $faker->sentence(rand(5, 10)),
        "category_id" => factory(Category::class)->make()->id,
        "artist_name" => $faker->name,
        "event_description" => $faker->sentence(30),
        "optional_description" => $faker->sentence(20),
        "what_is_included" => implode(" ", $faker->words(rand(3, 7))),
        "event_start_date" => $event_start_date = Carbon::now()->addDays(rand(10, 20)),
        "event_end_date" => Arr::random([null, Carbon::now()->addDays(rand(25, 30))]),
        "is_featured" => rand(0, 1),
        "event_location" => $faker->address,
        "event_pincode" => random_int(700001, 799999),
        "event_district" => Arr::random(['DBR', "JRH", "GHY", "TEZ"]),
        "event_state" => Arr::random(['Assam', "Meghalaya", "Manipur"]),
        "event_slug" => Str::slug($event_name . "-" . date('M-d-Y', $event_start_date->timestamp)),
    ];
});
