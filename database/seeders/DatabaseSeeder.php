<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Station;
use App\Models\StationTrip;
use Illuminate\Database\Seeder;
use Database\Seeders\TripSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StationSeeder::class,
            TripSeeder::class,
            StationTripSeeder::class
        ]);
    }
}
