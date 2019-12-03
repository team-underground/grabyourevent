<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            // "id" => $this->id,
            "uuid" => $this->uuid,
            "event_name" => $this->event_name,
            "event_slug" => $this->event_slug,
            "event_image_path" => $this->event_image_path,
            // "event_image_orientation" => $this->event_image_orientation,
            "artist_name" => $this->artist_name,
            "event_description" => $this->event_description,
            "optional_description" => $this->optional_description,
            "what_is_included" => $this->what_is_included,
            "event_location" => $this->event_location,
            "event_pincode" => $this->event_pincode,
            "event_city" => $this->event_city,
            "event_state" => $this->event_state,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'event_category' => $this->event_category,
            'event_ticket_price' => $this->isFree()
                ? 'Free'
                : $this->ticket_price_formatted,
            'event_date' => date('d', $this->event_starting_date->timestamp),
            'event_month' => date('M', $this->event_starting_date->timestamp),
            'event_year' => date('Y', $this->event_starting_date->timestamp),
            'event_formatted_date' => $this->dateFormat(),
            'event_formatted_time' => $this->timeFormat(),
            'organiser' => $this->organiser,
            'links' => [
                'edit' => route('admin.events.edit', $this),
                'show' => route('events.show', $this->event_slug)
            ],
            'seo_title' => $this->seo_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords
        ];
    }
}
