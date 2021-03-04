<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceProvider;
use Faker\Generator as Faker;
use App\Category;

$factory->define(ServiceProvider::class, function (Faker $faker) {
    return [
        //
        'category_id' => Category::where('availability', 1)->first()->id,
        'name' => $faker->city,
        'email' => $faker->email,
        'phone_number' => mt_rand(1000000000,9999999999),
    ];
});
