<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Http\Resources\LocationResource;
use App\Models\Car;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationCarController extends Controller
{
    
    public function index($locationUuid)
    {
        try{   
            
            $location = Location::query()
                ->withCars(request()->search)
                ->whereUuid($locationUuid)
                ->firstOrFail();

            return new LocationResource($location);

        }catch(\Exception $e ){
            return response()->json($e,500);
        } 
        
    }

    public function store(Request $request,$locationUuid)
    {
        try{
            $location = Location::whereUuid($locationUuid)->firstOrFail();

            $car = Car::select(['id'])->whereUuid($request->car_id)->firstOrFail();

            $car = $location->cars()->attach($car->id);

            return response()->json(['message' => 'Car assigned to the location successfuly'], 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
