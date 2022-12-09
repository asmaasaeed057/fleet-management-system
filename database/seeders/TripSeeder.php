<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::insert(
            [
                [
                    'name' => 'Cairo-Asyut',
                    'from_station_id' => 1,
                    'to_station_id' => 4
                ],
                [
                    'name' => 'AlFayyum-Asyut',
                    'from_station_id' => 2,
                    'to_station_id' => 4
                ]
            ]
        );
    }
}
