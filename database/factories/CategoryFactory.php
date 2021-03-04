<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

//comment section this out after running the seeder at the CLI
// $factory->define(Category::class, function (Faker $faker) {
//     return [
//         'name' => 'Food',
//         'availability' => 1,
//     ];
// });


// Other non available categories

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Laundry', 'Pharmarcy', 'Grocery']),
        'availability' => 0,
    ];
});