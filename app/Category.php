<?php

namespace App;

use App\Event;

class Category extends BaseModel
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
