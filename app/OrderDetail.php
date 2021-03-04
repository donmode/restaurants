<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Define fillable properties
    protected $fillable = ['meal_id', 'fullname', 'email', 'phone_number', 'address', 'paid', 'email_sent'];
        
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    //define relationship to Meal
    public function meal(){
        return $this->belongsTo('App\Meal');
    }

    //define relationship to Payment
    public function payment(){
        return $this->hasOne('App\Payment');
    }
}
