<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Event;
use App\User;
use Carbon\Carbon;
use Faker\Generator as FakerGenerator;
use Illuminate\Support\Arr;

$factory->define(Event::class, function (FakerGenerator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));

    $filepath = storage_path('app/public/events');

    if (!File::exists($filepath)) {
        File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    }

    $array = ['Best Music', 'Great Audience', 'Foods'];
    $values = Arr::random($array, rand(1, 3));
    return [
        "uuid" => $faker->uuid,
        "organiser_id" => 2,
        "event_id" => 'GYE-' . rand(000000, 999999),
        "event_name" => $eventName = $faker->sentence(rand(5, 10)),
        "event_image" => 'events/' . $faker->image($filepath, 1200, 800, null, false),
        "event_category" => $faker->randomElement([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
        "artist_name" => $faker->name,
        "event_description" => $faker->sentence(30),
        "optional_description" => $faker->sentence(20),
        // "what_is_included" => explode(" ", $faker->sentence(rand(5, 10))),
        "event_starting_date" => $faker->dateTimeBetween('now', '+1 week'),
        "event_ending_date" => $faker->dateTimeBetween('+1 week', '+1 month'),
        "is_featured" => rand(0, 1),
        "event_location" => $faker->address,
        "event_pincode" => random_int(700001, 799999),
        "event_city" => $faker->city,
        "event_state" => $faker->state,
        "event_slug" => Str::slug($eventName . "-" . $faker->date('d-m-Y', 'now')),
        "latitude" => $faker->latitude(26, 27),
        "longitude" => $faker->longitude(91, 92),
        'seo_title' => $eventName,
        'meta_description' => $faker->sentence(rand(10, 20)),
        'meta_keywords' => $values,
        'event_status' => $value = rand(1, 2),
        'event_published_at' => $value == 2 ? (string) Carbon::now() : null
    ];
});
