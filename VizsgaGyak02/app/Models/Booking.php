<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'startDate',
        'endDate',
        'totalPrice',
        'car_id',
        'userUID'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
