<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
   
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function likes() {
        return $this->hasOne(Like::class);
    }

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
