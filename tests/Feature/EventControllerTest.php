<?php

namespace Tests\Feature;

use App\Category;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Arr;
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
        $response = $this->post('/events/create', [
            "event_name" => $sentence = $this->faker->sentence(5),
            "category_id" => factory(Category::class)->create()->id,
            "artist_name" => $this->faker->name,
            "event_description" => $this->faker->sentence(30),
            "optional_description" => $this->faker->sentence(20),
            "what_is_included" => ['asjkdhff', 'sadfjksadf', 'asdfsad'],
            "event_start_date" => Carbon::tomorrow(),
            "event_end_date" => Carbon::now()->addDays(5),
            "event_location" => $this->faker->address,
            "event_pincode" => random_int(700001, 799999),
            "event_district" => Arr::random(['DBR', "JRH", "GHY", "TEZ"]),
            "event_state" => Arr::random(['Assam', "Meghalaya", "Manipur"]),
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

        $response->assertSuccessful()
            ->assertJsonStructure([
                "event_name",
                "artist_name",
                "event_description",
                "optional_description",
                "what_is_included",
                "event_location",
                "event_pincode",
                "event_district",
                "event_state",
                "uuid",
                "id",
                "event_ticket_price"
            ]);

        $response = $this->get('/events');
        $response->assertJson([
            [
                'event_name' => $sentence
            ]
        ]);
        // dd($response->decodeResponseJson());
    }
}
