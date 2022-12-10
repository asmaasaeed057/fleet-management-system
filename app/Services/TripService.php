<?php

namespace App\Services;

use Exception;
use App\Repositories\TripRepository;

class TripService
{
    /**
     * @var TripRepository $tripRepo
     */
    protected $tripRepo;

    public function __construct(TripRepository $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }

    public function getTrips()
    {
        return $this->tripRepo->getTrips();
    }

    /**
     * @param array $requestParams
     */

    public function bookSeat(array $requestParams)
    {
        $isAvailableSeats =  $this->checkAvailableSeats($requestParams);
        if ($isAvailableSeats) {
            return  $this->tripRepo->bookUserTrip($requestParams);
        } else {
            throw new Exception("No Available Trips!", 500);
        }
    }

    /**
     * @param array $data
     */
    public function checkAvailableSeats($data): bool
    {
        $stations =  $this->tripRepo->getAvailableTripStationSeats($data);
        if (!$stations->isEmpty()) {
            $arrayOfSeats = [];
            foreach ($stations as $station) {
                if ($station->available_seats > 0) {
                    array_push($arrayOfSeats, 1);
                }
            }
            if (count($arrayOfSeats) == count($stations)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $requestParams
     */
    public function getAvailableSeats(array $requestParams)
    {
        return  $this->tripRepo->getAvailableSeats($requestParams);
    }
}
