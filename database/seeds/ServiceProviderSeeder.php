<?php

use Illuminate\Database\Seeder;
use App\ServiceProvider;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //populate 6 Service Providers
        factory(ServiceProvider::class, 3)->create();
    }
}
