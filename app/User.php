<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'phone_number',
        'title',
        'photo',
        'time_zone',
        'active',
        'authentication_token',
        'token_expiration'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function boards() {
        return $this->hasMany(Board::class);
    }

    public function teams() {
        return $this->hasMany(Team::class);
    }
}
