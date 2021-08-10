<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('orders.cart');
    }

    public function store(Request $request, $id)
    {

        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($item,$id);
        $request->session()->put('cart',$cart);
        return back();  
    }
    public function destroy($id)
    {   
        $cart = Session::get('cart');
        $deletedItem = $cart->items[$id];
        $cart->remove($deletedItem,$id);
        if(count($cart->items)==0)
        {
            Session::forget('cart');
        }
        return back(); 
    }

}
