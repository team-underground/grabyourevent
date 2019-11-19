<?php

namespace App;

use JamesMills\Uuid\HasUuidTrait;

class CustomerOrder extends BaseModel
{
    use HasUuidTrait;

    public function ordertickets()
    {
        return $this->hasMany(OrderTicket::class);
    }
}
