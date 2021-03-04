<?php

namespace App\Http\Controllers\V1;
// require __DIR__ . '\..\..\..\vendor\autoload.php';

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Yabacon\Paystack;
use App\OrderDetail;


class PaymentController extends Controller
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
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function handleGatewayCallback(){
        
        $data = request()->validate([
            'order_detail_id' => 'required|exists:order_details,id',
            'response'=>'required'
        ]);

        $paystack = new Paystack(env("PAYSTACK_SECRET_KEY",'sk_test_059143f130d73277b8d5c09b1e528648be9a5a27'));
        $trx = $paystack->transaction->verify(
            [
            'reference'=>$data['response']['reference']
            ]
        );

        if(!$trx->status){
            return response()->json(['data' =>['error'=>true,'message'=>"failed to verify transaction"]]);
        }else{
            $orderData = [];
            $orderData['order_detail_id'] = $data['order_detail_id'];
            $orderData['reference'] = $data['response']['reference'];
            $orderData['response'] = json_encode($data['response']);
            $orderData['status'] = $data['response']['status'];
            $orderData['redirecturl'] = $data['response']['redirecturl'];

        }

        $payment = Payment::create($orderData);
        if($payment->id){
            $orderDetail = OrderDetail::find($data['order_detail_id'])->with('meal')->first();
            $sendMail = new Payment();
            $sent = $sendMail->sendEmail($orderDetail, $payment);
            if($sent){
                $orderDetail->update(['paid'=>1,'email_sent'=>1]);
                return response()->json(['data' => ['success'=>true, 'message'=>"Payment Made Successfully!"]]);
            }
        }else{
            return response()->json(['data' => ['success'=>false, 'message'=>"Payment Failed!"]]);
        }

    }
}
