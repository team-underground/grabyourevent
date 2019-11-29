<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsTicketController extends Controller
{
    public function store($uuid)
    {
        $event = Event::findByUuidOrFail($uuid);
    }
}
