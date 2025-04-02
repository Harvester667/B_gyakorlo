<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = Reader::createFromPath( Storage::path( "public/cars.csv" ));
        $csv->setHeaderOffset( 0 ); // Set the CSV header offset
        $records = $csv->getRecords(); // Returns all the CSV records as an Iterator object

        foreach( $records as $record ){
            Car::create([
                "id" => $record["id"],
                "brand" => $record["brand"],
                "model" => $record["model"],
                "licensePlate" => $record["licensePlate"],
                "year" => $record["year"],
                "dailyPrice" => $record["dailyPrice"],
            ]);
        } 
    }
}
