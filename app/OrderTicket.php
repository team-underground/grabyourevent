<?php

namespace App;

use App\Ticket;
use App\CustomerOrder;

class OrderTicket extends BaseModel
{
    public function customerorder()
    {
        return $this->belongsTo(CustomerOrder::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
