<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StationTrip extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'station_trip';

    public $timestamps = true;

    protected $fillable = ['trip_id', 'from_station_id', 'to_station_id', 'available_seats'];
}
