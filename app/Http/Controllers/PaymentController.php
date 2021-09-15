<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function prepare_payment(Request $request)
    {
/*         dd($request); */
        if(auth()->user())
        {
            //validate deliver_price, address
            $this->validate($request,[
                'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
                'delivery_price'=>'required|integer|between:0,25',
            ]);
        }
        else
        {
            //validate deliver_price, name, email/phone, address
            $this->validate($request,[
                'name'=>'required|string|max:50|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$)/',
                'email'=>'required|email|max:150',
                'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
                'delivery_price'=>'required|integer|between:0,25',
            ]);
        }

        //retrive cart from session
        $cart = Session::get('cart');
        //calculate total price
        $total_price = $cart->totalPrice + (($request->delivery_price)!=0?$cart->delivery_price:0) ;
        //payment data
        $payment_data = array("merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
        "amount" => $total_price,
        "callback_url" => "/payment-result",
        "description" => "خرید تست",
        "metadata" => [ "email" => $request->email,"mobile"=>"09121234567"],
        );
    
        //attemp payment
        $request_payment = $this->request_payment($payment_data);
          //if payment is successfull 
        if($request_payment['status'])
        {
            //create order and order items and save to DB
            $order = Order::create(
                [
                    'user_id',
                    'guest_email',
                    'guest_phone',
                    'delivery_address',
                    'delivery_price',
                    'total_price',
                    'notes'
                ]
             );
            //create payment and save top DB
            //delete cart
            //return to order result page with payment and order info
            return redirect()->route('payment.payment_result',['payment_data'=>$payment_data]);
        }
        //if payment failed



            //return back with errors
    }

    private function request_payment($data)
    {
        //send payment to payment API


        //payemnt success
        $result = array("status"=>true);
        return $result;
    }

    public function payment_result()
    {
        return view('payments.payment-result');
    }

    private function payment_verification()
    {

    }
}
