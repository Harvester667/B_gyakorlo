<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'licensePlate',
        'year',
        'dailyPrice'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
