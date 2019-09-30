<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{

    public function toArray($request): array
    {
        // dd($this->event->event_date_formatted);
        return [
            "id" => $this->id,
            "uuid" => $this->uuid,
            "serial_number" => $this->serial_number,
            'ticket_category' => $this->ticketcategory->ticket_category_name,
            'event_name' => $this->event->event_name,
            'event_formatted_date' => date('D, d M, Y', $this->event->event_start_date->timestamp),
            'event_formatted_time' => date('h:i A', $this->event->event_start_date->timestamp),
            'no_of_entries' => $this->no_of_entries,
            'purchase_date' => $this->purchase_date,
            'links' => [
                'download' => route('events.edit', $this->event)
            ],
        ];
    }
}
