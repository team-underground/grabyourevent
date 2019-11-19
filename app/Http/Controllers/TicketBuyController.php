<?php

namespace App\Http\Controllers;

use App\Event;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TicketBuyController extends Controller
{
    public function create($event)
    {
        return Inertia::render('Front/BuyTickets/Create', [
            'ticket_categories' => $event->ticketcategories
        ]);
    }
}
