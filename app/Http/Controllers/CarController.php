<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreUpdateRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    
    public function index()
    {
        try{

            $cars = Car::query()
                ->search(request()->search)
                ->orderBy('created_at','DESC')
                ->simplePaginate();

            return CarResource::collection($cars);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }  
    }

    public function store(CarStoreUpdateRequest $request)
    {
        try{

            $createdCar = Car::create($request->validated());

            return new CarResource($createdCar);

        }catch(\Exception $e)  {
            return response()->json($e->getMessage(),500);
        }   
    }

    public function show(string $uuid)
    {
        try {

            $car = Car::selectAttributes()->whereUuid($uuid)->firstOrFail();
            
            return new CarResource($car);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }   
    }

    public function update(CarStoreUpdateRequest $request, string $uuid)
    {
        try {

            $car = Car::whereUuid($uuid)->firstOrFail();

            $car->update($request->validated());

            $car->refresh();

            return new CarResource($car);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }  
    }

    public function destroy(string $uuid)
    {
        try {

            Car::whereUuid($uuid)->delete();

            return response()->json(['message' => 'Car has been deleted sucessfuly'],204);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }  
    }
}
