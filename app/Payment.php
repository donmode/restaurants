<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\OrderDetail;

class Payment extends Model
{
    // Define fillable properties
    protected $fillable = ['order_detail_id', 'reference', 'status','redirecturl','response'];
    
    //define relationship to OrderDetail
    public function orderDetail(){
        return $this->belongsTo('App\OrderDetail');
    }

    public function sendEmail(OrderDetail $orderDetail, $payment)
    {
        $title = '[Confirmation] Thank you for your order';
        $customer_details = [
            'name' => $orderDetail->fullname,
            'address' => $orderDetail->address,
            'phone' => $orderDetail->phone_number,
            'email' => $orderDetail->email
        ];
        $order_details = [
            'payment_reference' => $payment->reference,
            'price' => $orderDetail->meal->price,
            'order_date' => $orderDetail->created_at,
        ];

        $sendmail = Mail::to($customer_details['email'])->send(new SendMail($title, $customer_details, $order_details));
        if (empty($sendmail)) {
            return response()->json(['message' => 'Mail Sent Sucssfully', 'success'=>true], 200);
        }else{
            return response()->json(['message' => 'Mail Sent fail', 'success'=>false], 400);
        }
    }
}
