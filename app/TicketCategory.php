<?php

namespace App;

use App\Ticket;

class TicketCategory extends BaseModel
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
