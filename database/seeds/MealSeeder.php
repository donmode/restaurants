<?php

use Illuminate\Database\Seeder;
use App\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Meal::class, 6)->create();
    }
}
