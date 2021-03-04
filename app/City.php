<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Define fillable properties
    protected $fillable = ['name'];

    //Define the relationship to the CityServiceProvider Pivot Model
    public function serviceProviders()
    {
        return $this->belongsToMany('App\ServiceProvider')->withPivot('availability')->withTimestamps();
    }
}
