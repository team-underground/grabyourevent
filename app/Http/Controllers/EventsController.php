<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Http\Resources\EventResource;

/**
 * @group Events
 * 
 * Apis for managing events
 */
class EventsController extends Controller
{
    /**
     * All Events
     * Api for public listing of all the events
     */
    public function index()
    {
        $featured = Event::isFeatured();
        $upcoming = Event::isUpcoming();

        return response([
            'FEATURED EVENTS' => $featured->transform(function ($event) {
                return new EventResource($event);
            }),
            'UPCOMING EVENTS' => $upcoming->transform(function ($event) {
                return new EventResource($event);
            }),
            'BROWSE EVENTS BY GENRE' => Category::select('category_name')->withCount('events')->get()
        ]);
    }

    /**
     * Store A new Event
     * Api for storing a new event, only for admin and organiser
     * 
     */
    public function store(CreateEventRequest $request)
    {
        // dd($request->all());
        $event = Event::create(array_merge($request->except('ticket_categories'), [
            "uuid" => Str::uuid(),
            "event_slug" => Str::slug($request->event_name . "-" . date('M-d-Y', $request->event_start_date->timestamp))
        ]));
        // dd($event);

        $event->generateTicketCategories($request->ticket_categories);
        // return response($event);
        return response(new EventResource($event));
    }

    /**
     * Edit Event
     * Api for editing event, only for admin and organiser
     */
    public function edit($event)
    {
        return response(new EventResource($event));
    }

    /**
     * Show Event
     * Api for publicly showing event details
     */
    public function show($eventSlug)
    {
        $event = Event::where('event_slug', $eventSlug)->firstOrFail();

        return response(new EventResource($event));
    }
}
