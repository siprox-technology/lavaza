<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;
class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function store($cart,Request $request)
    {
        $order = Order::create([
            'user_id' => ((auth()->user()) ? auth()->user()->id : null),
            'email' => ((auth()->user()) ? auth()->user()->email : null),
            'phone' => (auth()->user()) ? auth()->user()->phone : $request->phone,
            'delivery_address' => $request->address,
            'delivery_price' => (($request->delivery_price) != 0 ? $cart->delivery_price : 0),
            'total_price' =>$cart->totalPrice + (($request->delivery_price)!=0?$cart->delivery_price:0),
            'notes' => $cart->notes
        ]);
        $this->storeItems($cart,$order);
        return $order;
    }
    private function storeItems($cart,$order)
    {
        foreach($cart->items as $item)
        {
            $order_item = Order_item::create([
                'quantity'=> $item['quantity'],
                'price' => $item['price'],
                'order_id' => $order['id'],
                'name' => $item['item']['name'],
                'name_fa' => $item['item']['name_fa'],
            ]); 
        }
    }
}
