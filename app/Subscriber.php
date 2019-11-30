<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class Subscriber extends Model
{
    use HasUuidTrait;
    protected $guarded = [];
}
