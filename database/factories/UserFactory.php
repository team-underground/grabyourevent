<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as FakerGenerator;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (FakerGenerator $faker) {

    $filepath = storage_path('app/public/profile_photos');

    if (!File::exists($filepath)) {
        File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    }

    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'phone' => rand(6000000000, 9999999999),
        'profile_photo' => 'profile_photos/' . $faker->image($filepath, 100, 100, null, false),
        'short_description' => $faker->sentence(10),
        'website_url' => $faker->url,
        'remember_token' => Str::random(10),
    ];
});
