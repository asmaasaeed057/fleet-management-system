<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TripController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::prefix('trips')->group(function () {
    Route::get('get-available-seats', [TripController::class, 'getAvailableSeats']);
    Route::get('get-trips', [TripController::class, 'getTrips']);
    Route::post('book-seat', [TripController::class, 'bookSeat'])->middleware('auth:sanctum');
});
