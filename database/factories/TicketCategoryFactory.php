<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TicketCategory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(TicketCategory::class, function (Faker $faker) {
    $ticketCategories = ['Free tickets', 'Camping with breakfast Ticket', 'Camping with breakfast and dinner Ticket'];
    return [
        'uuid' => Str::uuid(),
        'event_id' => rand(1, 30),
        'ticket_category_name' => $categoryName = $faker->randomElement($ticketCategories),
        'ticket_category_description' => $faker->sentence(10),
        'ticket_category_price' => $categoryName == 'Free tickets' ? 0 : rand(300, 5000),
        'no_of_tickets' => $noOfTickets = rand(10, 50),
        'no_of_tickets_left' => $noOfTickets,
        "ticket_category_start_date" => $faker->dateTimeBetween('now', '+1 week'),
        "ticket_category_end_date" => $faker->dateTimeBetween('+1 week', '+1 month'),
    ];
});
