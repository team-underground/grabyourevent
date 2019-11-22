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
        if (request()->path() === 'events') {
            $query = Event::published()->closed(false);

            return Inertia::render('Front/Events/Index', [
                'events' => $query->orderBy('event_starting_date')->paginate()
                    ->transform(function ($event) {
                        return new EventResource($event);
                    }),
                'events_count' => $query->count()
            ]);
        } else {
            $query = Event::whereRaw('MONTH(event_starting_date) = ?', [date('m')])->published()->closed(false);

            return Inertia::render('Front/Events/ThisMonth', [
                'events' => $query->orderBy('event_starting_date')->paginate()
                    ->transform(function ($event) {
                        return new EventResource($event);
                    }),
                'events_count' => $query->count()
            ]);
        }
    }

    /**
     * Show Event
     * Api for publicly showing event details
     */
    public function show($eventSlug)
    {
        $event = Event::with('organiser')->where('event_slug', $eventSlug)->firstOrFail();
        // record page views
        views($event)->record();

        return Inertia::render('Front/Events/Show', [
            'event' => new EventResource($event)
        ]);
    }
}
