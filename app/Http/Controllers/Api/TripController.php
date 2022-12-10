<?php

namespace App\Http\Controllers\Api;

use Throwable;
use Illuminate\Http\Request;
use App\Services\TripService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;

class TripController extends Controller
{

    /**
     * @var TripService $tripService
     */
    protected $tripService;

    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }


    public function getTrips()
    {
        try {
            $trips = $this->tripService->getTrips();
            return response()->json([
                'message' => "Available Trips",
                'trips' => $trips
            ], 200);
        } catch (Throwable $e) {

            return response()->json([
                'message' => "No Trips",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function bookSeat(BookRequest $request)
    {
        try {
            $this->tripService->bookSeat($request->all());

            return response()->json([
                'message' => "Trip booked successfully",
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => "No available seats!",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAvailableSeats(Request $request)
    {
        try {

            $stationSeats = $this->tripService->getAvailableSeats($request->all());
            return response()->json([
                'message' => "Available Seats in stations",
                'stationSeats' => $stationSeats

            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => "No available seats to be booked!",
                'error' => $e->getMessage()
            ], 500);
        }
       
    }
}
