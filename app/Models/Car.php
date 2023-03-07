<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'brand',
        'model'
    ];

    public function scopeSelectAttributes($query)
    {
        //TODO: Send the attributes that the user needs
        //TODO: EXAMPLE: cars?fields=type,model,created_at
        $query->select([
            'id',
            'uuid',
            'type',
            'model',
            'brand',
            'created_at'
        ]);
    }

    public function scopeSearch($query,$value)
    {
        if (!$value){
            return;
        } 

        $query->where('model','like','%'.$value.'%')
            ->orWhere('brand','like','%'.$value.'%');
    }


}
