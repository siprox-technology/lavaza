<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function attempt_payment(Request $request)
    {
/*         dd($request); */
        //validate deliver_price, name, email/phone, address
        $this->validate($request,[
            'name'=>'required|string|max:50|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$)/',
            'email'=>'required|email|max:150',
            'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
            'delivery_price'=>'required|integer|between:0,25',
        ]);
        //retrive cart from session
        $cart = Session::get('cart');
        //calculate total price and attempt paymnet
        $total_price = $cart->totalPrice + (($request->delivery_price)<=25?$cart->delivery_price:0) ;

        dd($total_price);

        //if payment is successfull 
            //create order and order items and save to DB
            //create payment and save top DB
            //delete cart
            //return to order result page with payment and order info

        //if payment not successfull
            //return back with errors
    }

    private function payment()
    {
        //send POST request to payment API

        //return result
    }
}
