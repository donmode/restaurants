<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
    public function store(Request $request,OrderDetail $orderDetail)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'meal_id' => 'required|exists:meals,id',
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number'=>'required|min:13|numeric'
        ]);
        $order = OrderDetail::create($data);

        return response()->json(['data' => OrderDetail::where('id',$order->id)->with('meal')->first()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
