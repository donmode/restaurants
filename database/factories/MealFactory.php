<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;
use App\ServiceProvider;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'service_provider_id' => $faker->randomElement(ServiceProvider::get()->pluck('id')->toArray()),
        'name' => $faker->city,
        'price' => $faker->randomElement([1000.00, 10000.00, 6000.00, 7500.00, 8000.00]),
        'preparation_time_in_minute' => $faker->randomElement([1.00, 6.05, 5.00, 3.00])
    ];
});
