<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trips';

    public $timestamps = true;

    protected $fillable = ['name','from_station_id','to_station_id'];

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'station_trip');
    }
}
