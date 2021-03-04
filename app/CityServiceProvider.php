<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityServiceProvider extends Model
{
    // Define fillable properties
    protected $fillable = ['city_id', 'service_provider_id', 'availability'];

    // Set default attribute
    protected $attributes = [
        'availability' => 1
    ];
}
