<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('V1')->group(function(){
    //fetches all categories
    Route::get('/categories', 'CategoryController@index');

    // feteches all service providers of a category
    Route::get('/categories/{category}/service-providers', 'ServiceProviderController@showByCategory');

    //fetches service providers of a category based on city
    Route::post('/categories/{category}/service-providers', 'ServiceProviderController@searchByCity');
    
    //list Meals based on service_provider_id
    Route::get('/serviceProviders/{serviceProvider}/meals', 'MealController@showByServiceProvider');

    //Accept Order Details and return order_detail_id for payment processing
    Route::post('orderDetails', 'OrderDetailController@store');

    //Payment
    // Payment Callback URI
    Route::post('/payments/callback', 'PaymentController@handleGatewayCallback');

    //Confirmation Email
    Route::get('sendmail/{orderDetail}', 'MailController@sendmail');

});