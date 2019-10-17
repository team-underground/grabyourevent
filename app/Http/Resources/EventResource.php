<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    public function toArray($request): array
    {
        // dd($this->event_date_formatted);
        return [
            // "id" => $this->id,
            "uuid" => $this->uuid,
            "event_name" => $this->event_name,
            "event_slug" => $this->event_slug,
            "artist_name" => $this->artist_name,
            "event_description" => $this->event_description,
            "optional_description" => $this->optional_description,
            "what_is_included" => $this->what_is_included,
            "event_location" => $this->event_location,
            "event_pincode" => $this->event_pincode,
            "event_district" => $this->event_district,
            "event_state" => $this->event_state,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'category_name' => $this->category->category_name,
            'event_ticket_price' => $this->isFree()
                ? 'Free'
                : $this->ticket_price_formatted,
            'event_formatted_date' => $this->dateFormat(),
            'links' => [
                'edit' => route('events.edit', $this),
                'show' => route('events.show', $this->event_slug)
            ],
        ];
    }
}
