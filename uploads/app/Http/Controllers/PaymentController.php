<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use App\Mail\OrderConfirmed;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\OrderController;
use Trez\RayganSms\Facades\RayganSms;

class PaymentController extends Controller
{
    public function attemp_payment(Request $request)
    { 
        //validate delivery_price, address name,phone
        $this->validate($request,[
            'name'=>'required|string|max:50|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$)/',
            'phone'=>'required|digits:11',
            'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
            'delivery_price'=>'required|between:0,25.00',
        ]);
        
        $cart = Session::get('cart');
        //get payment data
        $payment_data = $this->getPaymentData($cart,$request);

        //attemp payment
        $request_payment = $this->request_payment($payment_data);
          
        //if payment failed
        if($request_payment['status']==false)
        {
            //do something
        }
        //create order and order items and save to DB
        $order_contr = new OrderController();
        $order = $order_contr->store($cart,$request);
        //create payment and save top DB
        $this->store($order,$request_payment);

        //delete cart
        Session::forget('cart');

        //SMS and/or email user
        if(auth()->user())
        {
            //email order confirmation to user
            Mail::to(auth()->user()->email)->
            send(new OrderConfirmed($request_payment,$order->id));
        }
        //send order confirmation text to user
        $confirmation_text = ' سفارش شما به شماره '.$order->id.' با مبلغ '.number_format($request_payment['amount'],0).' '.'تومان با موفقیت ثبت شد. با تشکر رستوران لاوازا  ';
        RayganSms::sendMessage((auth()->user())?auth()->user()->phone:$request->phone,$confirmation_text);

        //return to order result page with payment and order info
        return redirect()->route('payment.payment_result',['payment_data'=>$request_payment,'order_id'=>$order->id]);

    }

    private function getPaymentData($cart,Request $request)
    {
        //calculate total price
        $total_price = $cart->totalPrice + (($request->delivery_price)!=0?$cart->delivery_price:0);
        $payment_data = array("merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
        "amount" => $total_price,
        "callback_url" => "/payment-result",
        "description" => "خرید تست",
        "metadata" => [ "email" => ((auth()->user())?auth()->user()->email:null),"mobile"=>$request->phone],
        );

        return $payment_data;
    }

    private function request_payment($data)
    {
        //send payment to payment API


        //payemnt success
        $result = array(
            "status"=>true,
            "message"=>"پرداخت با موفقیت انجام شد",
            "amount"=>$data['amount'],
            "payment_method" =>"Saman Bank",
            "last_four_digits" => "1234",
            "payment_ref" =>"545asdsda2s12121asds2",
            "date_time" =>  Jalalian::fromDateTime(Carbon::now()->toDateTimeString())->toString()
        );
        
        //payment failed
        //do something

        return $result;
    }

    private function store($order,$request_payment)
    {
        return Payment::create([
            'order_id' => $order['id'],
            'amount'=>$request_payment['amount'],
            'payment_method'=>$request_payment['payment_method'],
            'last_four_digit'=>$request_payment['last_four_digits'],
            'payment_ref'=>$request_payment['payment_ref']
        ]);
    }

    public function payment_result()
    {
        return view('payments.payment-result');
    }

    private function payment_verification()
    {

    }
}
