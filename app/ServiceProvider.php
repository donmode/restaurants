<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    // Define fillable properties
    protected $fillable = ['category_id', 'name', 'phone_number', 'logo', 'email'];

    //define relationship to Category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Define the relationship to the CityServiceProvider Pivot Model
    public function cities()
    {
        return $this->belongsToMany('App\City')->withPivot('availability')->withTimestamps();
    }

    //define relationship to Meal
    public function meals(){
        return $this->hasMany('App\Meal');
    }
}
