<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/addcar", [ CarController::class, "addCar" ]);
Route::get("/cars", [ CarController::class, "getCars" ]);
Route::put("/cars/{id}", [ CarController::class, "modCar" ]);
Route::delete("/cars/{id}", [ CarController::class, "delCar" ]);

Route::get("/bookings", [ BookingController::class, "getBookings" ]);