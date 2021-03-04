<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Meal;
use App\ServiceProvider;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource based on Service Provider 
     *
     * @param  \App\Meal  $meal
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function showByServiceProvider(ServiceProvider $serviceProvider, Meal $meal)
    {
        //fetch per service_provider_id passed
        return ['data' => $meal->where('service_provider_id', $serviceProvider->id)->get()];

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
