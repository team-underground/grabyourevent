<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactsQuery extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'description'
    ];
    protected $table = 'contacts';
}
