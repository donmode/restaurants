<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityServiceProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_service_provider', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('service_provider_id')->constrained('service_providers');
            $table->boolean('availability')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_service_provider');
    }
}
