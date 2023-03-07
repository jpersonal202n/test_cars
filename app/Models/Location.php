<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;


    public function cars()
    {
        return $this->belongsToMany(Car::class, 'locations_cars');
    }

    public function scopeWithCars($query,$search)
    {
        $query->with([
            'cars' => function ($query) use ($search) {
                if (!$search) {
                    return $query;
                }
                $query->where('cars.brand', 'like', '%' . $search . '%')
                    ->orWhere('cars.model', 'like', '%' . $search . '%');
            }
        ]);
    }

}
