<?php

namespace App\Http\Controllers;

use App\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use CyrildeWit\EloquentViewable\View;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $events = Event::published()->with('organiser')->orderByViews()->closed(false)->role()->limit(10)->get()->transform(function ($event) {

            return [
                'uuid' => $event->uuid,
                'event_name' => $event->event_name,
                'event_published_at_formatted' => $event->event_published_at_formatted,
                'total_page_views' => views($event)->count(),
                'unique_page_views' => views($event)->unique()->count()
            ];
        });
        $query = View::with('viewable')->whereHasMorph('viewable', [Event::class], function ($query) {
            $query->published()->closed(false)->role();
        });

        $uniqueCounts = $query->select([
            \DB::raw('count(DISTINCT visitor, viewable_id) as `total`'),
            \DB::raw("DATE_FORMAT(viewed_at, '%Y-%m-%d') as day")
        ])->groupBy('day')->orderBy('day')->pluck('total', 'day')->all();

        $totalCounts = $query->select([
            \DB::raw('count(id) as `total`'),
            \DB::raw("DATE_FORMAT(viewed_at, '%Y-%m-%d') as day")
        ])->groupBy('day')->orderBy('day')->pluck('total', 'day')->all();

        return Inertia::render('Dashboard', [
            'events' => $events,
            'unique_counts' => count($uniqueCounts) > 1 ? $uniqueCounts : [],
            'total_counts' => count($totalCounts) > 1 ? $totalCounts : [],
            'can' => [
                'modify-user' => Gate::allows('modify-user')
            ]
        ]);
    }
}
