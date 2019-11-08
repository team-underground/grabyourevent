<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $featured = Event::featured(1)->published()->closed(false)->orderBy('event_starting_date')->limit(10)->get();
        // dd($featured);
        $upcoming = Event::upcoming()->published()->closed(false)->orderBy('event_starting_date')->featured(0)->limit(10)->get();

        return Inertia::render('Welcome', [
            'featured' => $featured->transform(function ($event) {
                return new EventResource($event);
            }),
            'upcoming' => $upcoming->transform(function ($event) {
                return new EventResource($event);
            }),
            'categories' => Event::groupBy('event_category')->select('event_category', \DB::raw('count(event_category) as `total`'))->orderBy('total', 'DESC')->get(['total', 'event_category'])->transform(function ($category) {
                return [
                    'category_name' => $category->event_category,
                    'total' => $category->total
                ];
            })
        ]);
    }
}
