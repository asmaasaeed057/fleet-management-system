<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TripUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trip_user';

    public $timestamps = true;

    protected $fillable = ['user_id', 'station_trip_id'];
}
