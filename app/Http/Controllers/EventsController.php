<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Http\Resources\EventResource;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response($events->transform(function ($event) {
            return new EventResource($event);
        }));
    }

    public function store(CreateEventRequest $request)
    {
        $event = Event::create(array_merge($request->except('ticket_categories'), [
            "uuid" => Str::uuid(),
            "event_slug" => Str::slug($request->event_name . "-" . date('M-d-Y', $request->event_start_date->timestamp))
        ]));

        $event->generateTicketCategories($request->ticket_categories);
        // return response($event);
        return response(new EventResource($event));
    }

    public function edit($event)
    {
        return response(new EventResource($event));
    }
}
