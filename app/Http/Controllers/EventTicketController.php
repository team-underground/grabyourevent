<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Ticket;
use App\TicketCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Validator;

class EventTicketController extends Controller
{
    public function store(Request $request, $event)
    {
        foreach ($request->ordered_tickets as $orderedTicket) {
            $ticketCategory = TicketCategory::where('id', $orderedTicket['ticket_category_id'])->first();

            for ($i = 0; $i < $orderedTicket['no_of_tickets']; $i++) {
                $ticketCategory->tickets()->create([
                    'uuid' => Str::uuid(),
                    'serial_number' => Str::upper(Str::random(8)),
                    'event_id' => $event->id
                ]);
            }

            $ticketCategory->no_of_tickets_left = $ticketCategory->no_of_tickets - $orderedTicket['no_of_tickets'];
            $ticketCategory->save();
        }

        $tickets = TicketCategory::with('tickets')->whereIn('id', $request->ticket_catgories)->get()->pluck('tickets')->flatten();

        // TODO need to send the tickets to ticket buyer in mail with ticket attachments

        return response($tickets->transform(function ($ticket) {
            return new TicketResource($ticket);
        }));
    }
}
