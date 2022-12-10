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
                ],
                [
                    'name' => 'AlFayyum-Asyut',
                ]
            ]
        );
    }
}
