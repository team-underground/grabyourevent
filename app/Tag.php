<?php

namespace App;

use App\Event;

class Tag extends BaseModel
{
    public function events()
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }
}
