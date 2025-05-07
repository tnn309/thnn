<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'freelancer_id', 'booking_date', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}