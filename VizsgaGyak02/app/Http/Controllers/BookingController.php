<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function getBookings(){
        $bookings = Booking::all();

        return response()->json( $bookings, 200 );
    }

    public function delBooking( $id ){
        // $booking = Booking::find( $id );
        // $booking->delete();

        $succes = Booking::find( $id )->delete();

        // return response()->json( $car, 200 );
        return response()->json( $succes, 200 );
    }
}
