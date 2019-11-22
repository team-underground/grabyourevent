<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use Inertia\Inertia;
use App\Enums\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::with('organiser')
            ->filter(request()->only('search'))
            ->role()
            ->orderByDesc('created_at')
            ->simplePaginate(10);

        $filters = request()->all('search');

        return Inertia::render('Admin/Events/Index', compact('events', 'filters'));
    }
    public function create()
    {
        $categories = CategoryType::toSelectArray();

        return Inertia::render('Admin/Events/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'event_name' => ['required'],
            'event_category' => ['required'],
            'event_description' => ['required'],
            'optional_description' => ['required'],
            'event_keywords' => ['required'],
            'event_starting_date' => ['required', 'date_format:Y-m-d H:i:s', 'before_or_equal:event_ending_date'],
            'event_ending_date' => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:event_starting_date'],
            'event_location' => ['required'],
            'event_city' => ['required'],
            'event_pincode' => ['required'],
            'event_state' => ['required'],
            'meta_description' => ['required'],
            'meta_keywords' => ['required'],
            'seo_title' => ['required']
        ]);

        DB::transaction(function () use ($request) {
            $event = Event::create($request->except([
                'event_category',
                'event_keywords',
                'event_image'
            ]) + [
                'organiser_id' => 1,
                'event_id' => 'GYE-' . rand(000000, 999999),
                'event_category' => (int) $request->event_category,
                'event_image' => $request->file('event_image') ? $request->file('event_image')->store('events', 'public') : null

            ]);

            if ($event) {
                $event->attachTags($request->event_keywords);
            }
            // TODO 1. when a event is posted notify admin about it, and send a mail to the event publisher saying a thank you mail and inform him that post will be published within 24 hours after verification.
            //TODO 2. write a cronjob where the server notifies admin, before 2 days of event starting date about the unpublished events.
            //TODO 3. generate ticket categories fo the event
            // event(new JobPostEvent($event));
            // Mail::to(auth()->user()->email)->queue(new ThanksGiving(auth()->user()->name));
            // $event->generateTicketCategories($request->ticket_categories);
        }, 3);

        session()->flash('success', 'Event Created.');
        return redirect()->route('admin.events.create');
    }

    public function edit(Event $event)
    {
        $event = $event->load('organiser');
        $eventStartTimestamp = $event->event_starting_date->timestamp;
        $eventEndTimestamp = $event->event_ending_date->timestamp;
        // dd($event->event_starting_date);
        $event->event_start_date_formatted = date('d/m/Y', $eventStartTimestamp);
        $event->event_start_time_formatted = [
            "HH" => date('H', $eventStartTimestamp),
            "mm" => date('i', $eventStartTimestamp)
        ];

        $event->event_end_date_formatted = date('d/m/Y', $eventEndTimestamp);
        $event->event_end_time_formatted = [
            "HH" => date('H', $eventEndTimestamp),
            "mm" => date('i', $eventEndTimestamp)
        ];

        $categories = CategoryType::toSelectArray();

        $can = [
            'publish-event' => Gate::allows('publish-event', $event),
            'update-event-seo' => Gate::allows('update-event-seo', $event),
        ];

        return Inertia::render('Admin/Events/Edit', compact('event', 'categories', 'can'));
    }

    public function update(Event $event, Request $request)
    {
        $rules = [
            'event_name' => ['required'],
            'event_category' => ['required'],
            'event_description' => ['required'],
            'optional_description' => ['required'],
            'event_keywords' => ['required'],
            'event_starting_date' => ['required', 'date_format:Y-m-d H:i:s', 'before_or_equal:event_ending_date'],
            'event_ending_date' => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:event_starting_date'],
            'event_location' => ['required'],
            'event_city' => ['required'],
            'event_pincode' => ['required'],
            'event_state' => ['required'],
            'meta_description' => ['required'],
            'meta_keywords' => ['required'],
            'seo_title' => ['required']
        ];

        if ($request->event_image_deleted == 'yes') {
            $rules['event_image'] = 'required|image|mimes:jpeg,png,jpg|max:1024';
        }

        $this->validate($request, $rules);


        DB::transaction(function () use ($request, $event) {
            $data = [
                'organiser_id' => 1,
                'event_category' => (int) $request->event_category
            ];

            if ($request->event_image_deleted == 'yes') {
                $data['event_image'] = $request->file('event_image') ? $request->file('event_image')->store('events', 'public') : null;
            }

            $event->update(
                $request->except([
                    'event_category',
                    'event_keywords',
                    'event_image',
                    'event_image_deleted'
                ]) + $data
            );

            if ($event && count($request->event_keywords) > 0) {
                $event->attachTags($request->event_keywords);
            }
        }, 3);

        session()->flash('success', 'Event Updated successfully.');
        return redirect()->back();
    }

    public function deleteImage($uuid)
    {
        $event = Event::findByUuidOrFail($uuid);

        // remove from the storage first
        $exists = Storage::disk('public')->exists($event->event_image);
        if ($exists) {
            Storage::delete($event->event_image);
        }

        $event->event_image = null;
        $event->save();

        session()->flash('success', 'Event Image successfully deleted.');

        return back();
    }
}
