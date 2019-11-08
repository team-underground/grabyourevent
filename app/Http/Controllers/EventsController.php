<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Contracts\Support\Arrayable;

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
        $events = Event::orderBy('event_starting_date')->published()->closed(false);

        return Inertia::render('Front/Events/Index', [
            'events' => $events->paginate()
                ->transform(function ($event) {
                    return new EventResource($event);
                }),
            'events_count' => Event::count()
        ]);
    }

    /**
     * Show Event
     * Api for publicly showing event details
     */
    public function show($eventSlug)
    {
        $event = Event::with('organiser')->where('event_slug', $eventSlug)->firstOrFail();

        return Inertia::render('Front/Events/Show', [
            'event' => new EventResource($event)
        ]);
    }
}
