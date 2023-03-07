<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LocationCarController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'] , function(){

    Route::apiResource('cars',CarController::class)
        ->names('api.v1.cars');

    Route::get('location/{location}/cars', [LocationCarController::class, 'index'])
        ->name('api.v1.location.cars');

    Route::post('location/{location}/cars',[LocationCarController::class,'store'])
        ->name('api.v1.location.cars');

});