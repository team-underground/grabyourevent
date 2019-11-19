<?php

namespace App;

use App\Event;
use App\TicketCategory;
use Illuminate\Support\Str;
use JamesMills\Uuid\HasUuidTrait;

class Ticket extends BaseModel
{
    use HasUuidTrait;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticketcategory()
    {
        return $this->belongsTo(TicketCategory::class, 'ticket_category_id');
    }
}
