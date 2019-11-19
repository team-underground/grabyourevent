<?php

use App\Event;
use App\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();
        // dd($events);
        $events->each(function ($event) {
            factory(TicketCategory::class, rand(1, 3))->create([
                "ticket_category_start_date" => $event->event_starting_date,
                "ticket_category_end_date" => $event->event_ending_date
            ]);
        });
    }
}
