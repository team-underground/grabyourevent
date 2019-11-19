<?php

namespace App;

use App\Ticket;
use App\CustomerOrder;
use JamesMills\Uuid\HasUuidTrait;

class OrderTicket extends BaseModel
{
    use HasUuidTrait;

    public function customerorder()
    {
        return $this->belongsTo(CustomerOrder::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
