<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function attempt_payment()
    {
        //validate deliver_price, name, email/phone, address
        
        //retrive cart from session

        //calculate total price and attempt paymnet


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
