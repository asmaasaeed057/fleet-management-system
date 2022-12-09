<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::insert(
            [
                [
                    'name' => 'Cairo',
                ],
                [
                    'name' => 'AlFayyum',
                ],
                [
                    'name' => 'AlMinya',
                ],
                [
                    'name' => 'Asyut',
                ]
            ]
        );
    }
}
