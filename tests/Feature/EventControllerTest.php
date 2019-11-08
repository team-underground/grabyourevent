<?php

namespace Tests\Feature;

use App\User;
use App\Event;
use App\Category;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Arr;
use App\Http\Resources\EventResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EventControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase, WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }
    /** @test */
    public function test_user_could_create_a_event()
    {
        $this->faker->addProvider(new \Faker\Provider\en_US\Address($this->faker));
        // dd($this->faker->latitude(26, 27));
        $response = $this->post('/events/create', [
            "event_name" => $sentence = $this->faker->sentence(5),
            "organiser_id" => factory(User::class)->create()->id,
            "category_id" => factory(Category::class)->create()->id,
            "artist_name" => $this->faker->name,
            "event_image" => $this->faker->image(),
            "event_description" => $this->faker->sentence(30),
            "optional_description" => $this->faker->sentence(20),
            "what_is_included" => ['asjkdhff', 'sadfjksadf', 'asdfsad'],
            "event_start_date" => Carbon::tomorrow(),
            "event_end_date" => Carbon::now()->addDays(5),
            "event_location" => $this->faker->address,
            "event_pincode" => random_int(700001, 799999),
            "event_district" => Arr::random(['DBR', "JRH", "GHY", "TEZ"]),
            "event_state" => Arr::random(['Assam', "Meghalaya", "Manipur"]),
            "latitude" => $this->faker->latitude(26, 27),
            "longitude" => $this->faker->longitude(91, 92),
            // "is_featured" => 1,
            "ticket_categories" => [
                [
                    "ticket_category_name" => "General Admission",
                    "ticket_category_price" => Arr::random([0, rand(1000, 3000)])
                ],
                [
                    "ticket_category_name" => "LOL Social Club Membership",
                    "ticket_category_description" => "6 Speed Dating Events + 1 Singles Mixer Party",
                    "ticket_category_price" => rand(3000, 5000),
                    "ticket_category_end_date" => Carbon::tomorrow()
                ],
            ]
        ]);
        // dd($response->decodeResponseJson());

        // $response->assertSuccessful()
        //     ->assertPropCount('events', 1);
        // ->assertJsonStructure([
        //     "event_name",
        //     "artist_name",
        //     "event_description",
        //     "optional_description",
        //     "what_is_included",
        //     "event_location",
        //     "event_pincode",
        //     "event_district",
        //     "event_state",
        //     "uuid",
        //     "event_ticket_price",
        //     "latitude",
        //     "longitude"
        // ]);
        // dd($response->decodeResponseJson());
        $response = $this->get('/events');
        // dd($response->decodeResponseJson());
        $response
            ->assertPropCount('events.data', 1)
            ->assertPropValue('events.data', function ($event) use ($sentence) {
                $this->assertEquals($sentence, $event[0]['event_name']);
            });
        //     ->assertJsonStructure([
        //     'FEATURED EVENTS',
        //     'UPCOMING EVENTS' => [
        //         [
        //             "event_name",
        //             "artist_name",
        //             "event_description",
        //             "optional_description",
        //             "what_is_included",
        //             "event_location",
        //             "event_pincode",
        //             "event_district",
        //             "event_state",
        //             "uuid",
        //             "event_ticket_price",
        //             "latitude",
        //             "longitude"
        //         ]
        //     ],
        //     'BROWSE EVENTS BY GENRE'
        // ]);
    }
}
