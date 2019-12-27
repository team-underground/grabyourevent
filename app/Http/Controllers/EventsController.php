<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\EventStatusType;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\EventResource;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Http\Requests\CreateEventRequest;
use Carbon\Carbon;
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
        SEOMeta::setTitle('Events');
        SEOMeta::setDescription('All the latest events happening in and around your nearby places.');
        SEOMeta::setCanonical(url('/events'));

        OpenGraph::setDescription('All the latest events happening in and around your nearby places.');
        OpenGraph::setTitle('Events');
        OpenGraph::setUrl(url('/events'));
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Events');
        JsonLd::setDescription('All the latest events happening in and around your nearby places.');

        // TODO Create an image banner in /public
        // JsonLd::addImage('https://codecasts.com.br/img/logo.jpg');

        if (request()->path() === 'events') {
            $query = Event::published()->closed(false);

            return Inertia::render('Front/Events/Index', [
                'events' => $query->orderBy('event_starting_date')->paginate(16)
                    ->transform(function ($event) {
                        return new EventResource($event);
                    }),
                'events_count' => $query->count()
            ]);
        } else {
            $query = Event::whereRaw('MONTH(event_starting_date) = ?', [date('m')])->published()->closed(false);

            return Inertia::render('Front/Events/ThisMonth', [
                'events' => $query->orderBy('event_starting_date')->paginate(16)
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
        // dd($event->isClosed());
        //TODO: scope the if statement into a gate named show-event
        if (
            $event->event_status === EventStatusType::getInstance(EventStatusType::Published)->key
            && $event->event_published_at != null
            && $event->isClosed()
        ) {
            abort(404);
        }
        // record page views
        views($event)->record();

        SEOMeta::setTitle($event->seo_title);
        SEOMeta::setDescription($event->meta_description);
        SEOMeta::addMeta('article:published_time', $event->event_formatted_date, 'property');
        SEOMeta::addMeta('article:section', $event->category_name, 'property');
        SEOMeta::addKeyword($event->meta_keywords);

        OpenGraph::setDescription($event->meta_description);
        OpenGraph::setTitle($event->seo_title);
        OpenGraph::setUrl(route('events.show', $event->event_slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage($event->event_image_path);
        OpenGraph::addImage($event->event_image_path, ['height' => 300, 'width' => 200]);
        // OpenGraph::addImage(['url' => $event->event_image_path, 'size' => 300]);

        JsonLd::setTitle($event->seo_title);
        JsonLd::setDescription($event->meta_description);
        JsonLd::setType('Article');
        JsonLd::addImage($event->event_image_path);

        // og:place
        OpenGraph::setTitle($event->event_location)
            ->setDescription($event->event_location . ', ' . $event->event_city . ', ' . $event->event_state . ', ' . $event->event_pincode)
            ->setType('place')
            ->setPlace([
                'location:latitude' => $event->latitude,
                'location:longitude' => $event->longitude,
            ]);

        return Inertia::render('Front/Events/Show', [
            'event' => new EventResource($event)
        ]);
    }
}
