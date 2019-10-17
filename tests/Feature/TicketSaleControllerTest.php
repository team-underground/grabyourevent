<?php

namespace Tests\Feature;

use App\Category;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketSaleControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_customer_could_buy_a_ticket()
    {
        $this->withoutExceptionHandling();
        $this->withHeader('Accept', 'application/json');

        $this->faker->addProvider(new \Faker\Provider\en_US\Address($this->faker));

        $response = $this->post('/events/create', [
            "event_name" => $sentence = $this->faker->sentence(5),
            "category_id" => factory(Category::class)->create()->id,
            "artist_name" => $this->faker->name,
            "event_description" => $this->faker->sentence(30),
            "optional_description" => $this->faker->sentence(20),
            "what_is_included" => ['asjkdhff', 'sadfjksadf', 'asdfsad'],
            "event_start_date" => Carbon::now()->addDays(3),
            "event_end_date" => Carbon::now()->addDays(10),
            "event_location" => $this->faker->address,
            "event_pincode" => random_int(700001, 799999),
            "event_district" => Arr::random(['DBR', "JRH", "GHY", "TEZ"]),
            "event_state" => Arr::random(['Assam', "Meghalaya", "Manipur"]),
            "latitude" => $this->faker->latitude(26, 27),
            "longitude" => $this->faker->longitude(91, 92),
            "ticket_categories" => [
                [
                    "ticket_category_name" => "General Admission",
                    "ticket_category_description" => "Regular admission to party",
                    "ticket_category_price" => rand(3000, 5000),
                    "ticket_category_end_date" => Carbon::now()->addDays(3),
                    "no_of_tickets" => 200
                ],
                [
                    "ticket_category_name" => "LOL Social Club Membership",
                    "ticket_category_description" => "6 Speed Dating Events + 1 Singles Mixer Party",
                    "ticket_category_price" => rand(5000, 8000),
                    "ticket_category_end_date" => Carbon::now()->addDays(2),
                    "no_of_tickets" => 20
                ]
            ]
        ]);

        $response = $this->post(route('tickets.buy', $response->original['uuid']), [
            'ticket_catgories' => [1, 2],
            'ordered_tickets' => [
                [
                    'ticket_category_id' => 1,
                    'no_of_tickets' => 3
                ],
                [
                    'ticket_category_id' => 2,
                    'no_of_tickets' => 10
                ]
            ]
        ]);

        $response->assertJsonCount(13)
            ->assertSuccessful();
    }
}
