<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function freelancer()
    {
        return $this->hasOne(Freelancer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}