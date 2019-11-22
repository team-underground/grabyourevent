<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Enums\EventStatusType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EventsPublishController extends Controller
{
    public function store($uuid, Request $request)
    {
        $event = Event::findByUuidOrFail($uuid);

        if (Gate::denies('publish-event', $event)) {
            abort(403, 'You are not authorised');
        }

        DB::transaction(function () use ($event) {
            $event->event_published_at = (string) Carbon::now();
            $event->event_status = EventStatusType::getInstance(EventStatusType::Published)->value;
            $eventpublished = $event->save();

            //TODO send event publish notification to intended user
        });

        session()->flash('success', 'Event Published.');

        return back();
    }
}
