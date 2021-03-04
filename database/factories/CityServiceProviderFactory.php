<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CityServiceProvider;
use Faker\Generator as Faker;
use App\ServiceProvider;
use App\City;

$factory->define(CityServiceProvider::class, function (Faker $faker) {
    return [
        'city_id'=>$faker->randomElement(City::get()->pluck('id')->toArray()),
        'service_provider_id'=>$faker->randomElement(ServiceProvider::get()->pluck('id')->toArray()),
        'availability'=>1
    ];
});
