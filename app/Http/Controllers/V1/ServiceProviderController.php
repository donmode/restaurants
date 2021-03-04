<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\ServiceProvider;
use App\Category;
use App\City;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        // return ['data' => $serviceProvider];
    }

    /**
     * Display the specified resource based on a selected category
     *
     * @param  \App\CategoryProvider  $categoryProvider
     * @return \Illuminate\Http\Response
     */
    public function showByCategory(Category $category, ServiceProvider $serviceProvider)
    {
        return response()->json(['data' => $serviceProvider->where('category_id', $category->id)->get()]);
    }

    
    /**
     * Display the specified resource based on a city name
     *
     * @param  \App\CategoryProvider  $categoryProvider
     * @return \Illuminate\Http\Response
     */
    public function searchByCity(Request $request, Category $category, ServiceProvider $serviceProvider)
    {
        $data = request()->validate([
            'city' => 'required|string',
        ]);
        
        $city = $data['city'];

        //query Service Provider where City is like the posted value
        $providers = ServiceProvider::whereHas('cities', function($q) use($city)
        {
            $q->where('name', 'like', $city.'%');

        })->where('category_id', $category->id)->get();

        return response()->json(['data' => $providers]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        //
    }
}
