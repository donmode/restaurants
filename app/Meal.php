<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    // Define fillable properties
    protected $fillable = ['name', 'service_provider_id', 'picture', 'price', 'preparation_time_in_minute', 'description'];
    
    //define relationship to ServiceProvider
    public function serviceProvider(){
        return $this->belongsTo('App\ServiceProvider');
    }
    
    //defines relationship with OrderDeatils
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
