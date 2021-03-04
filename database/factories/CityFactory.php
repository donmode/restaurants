<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Abuja', 'Kano', 'Ibadan', 'Uyo', 'Port Harcourt', 'Enugu', 'Asaba', 'Kano', 'Umuahia', 'Onitsha', 'Aba', 'Owerri']),
    ];
});
