<?php

use Illuminate\Database\Seeder;
use App\CityServiceProvider;

class CityServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //populate 5 CityServiceProvider
        factory(CityServiceProvider::class, 5)->create();
    }
}
