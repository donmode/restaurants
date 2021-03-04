<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Define fillable properties
    protected $fillable = ['name', 'availability'];
    
    // Set default properties
    protected $attributes = [
        'availability' => 0
    ];

    //defines relationship with Service provider
    public function service_providers()
    {
        return $this->hasMany('App\ServiceProvider');
    }
}
