<?php

namespace App;

use App\Event;
use App\Ticket;
use JamesMills\Uuid\HasUuidTrait;

class TicketCategory extends BaseModel
{
    use HasUuidTrait;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
