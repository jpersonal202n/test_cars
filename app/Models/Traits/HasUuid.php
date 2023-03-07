<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasUuid
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
