<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use App\Repositories\TripRepository;

class TripTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /**
     * @var TripService
     */
    protected $tripService;

    /**
     * @var TripRepository
     */
    protected $tripRepo;

    /**
     * @var array
     */
    public $requestParams;
    /**
     * @var array
     */
    public $getRequestParamsBookTrip;

    /**
     * @var User
     */
    public $id;

    /**
     * @var Trip
     */
    public $trips;


    protected function setUp(): void
    {
        parent::setUp();

        $this->tripService = new TripService(new TripRepository());
        $this->getRequestParams = $this->getRequestParams();
        $this->id = User::find(2)->id;
        $this->trips = Trip::all();
        $this->getRequestParamsBookTrip = $this->getRequestParamsBookTrip();
    }

    function test_json_response_for_get_trips()
    {
        $response = $this->json('GET', 'api/trips/get-trips');
        $response->assertStatus(200);
    }

    public function test_that_get_trips()
    {
        $this->assertNotEmpty($this->trips);
    }

    public function test_check_available_seat()
    {
        $this->assertTrue($this->tripService->checkAvailableSeats($this->getRequestParams));
    }

    private function getRequestParams(): array
    {
        return [
            'from_station_id' => 1,
            'to_station_id' => 4,
            'trip_id' => 1,
        ];
    }

    private function getRequestParamsBookTrip(): array
    {
        return [
            'from_station_id' => 1,
            'to_station_id' => 4,
            'trip_id' => 1,
            'user_id' => $this->id
        ];
    }
}
