<?php

namespace App;

use App\Enums\UserType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTypeAttribute($value)
    {
        return UserType::getDescription($value);
    }

    public function isAdmin()
    {
        return $this->type == (UserType::getInstance(UserType::Administrator))->key;
    }

    public function isOrganiser()
    {
        return $this->type == (UserType::getInstance(UserType::Organiser))->key;
    }
}
