<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Models\Car;

class CarController extends Controller
{

    public function getCars(){
        $cars = Car::with( "booking" )->get();

        return response()->json( $cars, 200 );
    }
  
    public function addCar( CarRequest $request ){
        $request->validated();

        $car = Car::create([
            "brand" => $request["brand"],
            "model" => $request["model"],
            "licensePlate" => $request["licensePlate"],
            "year" => $request["year"],
            "dailyPrice" => $request["dailyPrice"]
        ]);

        return response()->json([ $car, 206 ]);
    }

    public function modCar( CarRequest $request, $id ){
        $request->validated();

        $car = Car::find( $id );
        $car->brand = $request["brand"];
        $car->model = $request["model"];
        $car->licensePlate = $request["licensePlate"];
        $car->year = $request["year"];
        $car->dailyPrice = $request["dailyPrice"];

        $car->update();

        return response()->json([ $car, 206 ]);
    }

    public function delCar( $id ){
        // $car = Car::find( $id );
        // $car->delete();

        $succes = Car::find( $id )->delete();

        // return response()->json( $car, 200 );
        return response()->json( $succes, 200 );
    }
}
