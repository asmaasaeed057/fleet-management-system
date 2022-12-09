<?php

namespace Database\Seeders;

use App\Models\StationTrip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StationTrip::insert(
            [
                [
                    'trip_id' => 1,
                    'from_station_id' => 1,
                    'to_station_id' => 2,
                    'available_seats' => 12,
                ],
                [
                    'trip_id' => 1,
                    'from_station_id' => 2,
                    'to_station_id' => 3,
                    'available_seats' => 12,
                ],
                [
                    'trip_id' => 1,
                    'from_station_id' => 3,
                    'to_station_id' => 4,
                    'available_seats' => 12,
                ],
                [
                    'trip_id' => 2,
                    'from_station_id' => 2,
                    'to_station_id' => 3,
                    'available_seats' => 12,
                ],
                [
                    'trip_id' => 2,
                    'from_station_id' => 3,
                    'to_station_id' => 4,
                    'available_seats' => 12,
                ]
            ]
        );
    }
}
