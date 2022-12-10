<?php

namespace App\Repositories;

use App\Models\Trip;
use App\Models\Station;
use App\Models\TripUser;
use App\Models\StationTrip;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TripRepository
{

    public function getTrips()
    {
        return Trip::all();
    }

    public function getRequestedTripById($data)
    {
        return Trip::find($data['trip_id']);
    }

    /**
     * @param array $data
     */
    public function getAvailableTripStationSeats(array $data)
    {
        $availableTripStationSeats =  StationTrip::where('from_station_id', '=', $data['from_station_id'])
            ->orWhere('to_station_id', '=', $data['to_station_id'])
            ->where('trip_id', '=', $data['trip_id'])
            ->get()->pluck('id')->toArray();
        return StationTrip::whereBetween('id', $availableTripStationSeats)->get(); 
    }


    /**
     * @param array $data
     */
    public function bookUserTrip(array $data): bool
    {
        $stationsSeats =  $this->getAvailableTripStationSeats($data);
        foreach ($stationsSeats as $station) {
            TripUser::create([
                'station_trip_id' => $station->id,
                'user_id' => Auth::user()->id,
            ]);
            $station->available_seats = $station->available_seats - 1;
            $station->save();
        }
        return true;
    }

    /**
     * @param array $data
     */
    public function  getAvailableSeats(array $data)
    {
        $tripStations =  collect(StationTrip::select('id', 'trip_id', 'from_station_id', 'to_station_id', 'available_seats')
            ->where('available_seats', '>', 0)
            ->where('from_station_id', '=', $data['from_station_id'])
            ->orWhere('to_station_id', '=', $data['to_station_id'])
            ->get()->toArray());

        $groupedTripStations = $tripStations->mapToGroups(function ($item) {
            return [
                Trip::find($item['trip_id'])->name
                => [Station::find($item['from_station_id'])->toArray(), Station::find($item['to_station_id'])->toArray()]
            ];
        })->toArray();

        return $groupedTripStations;
    }
}
