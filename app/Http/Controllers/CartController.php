<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    public function index()
    {
        return view('orders.cart');
    }

    public function store(Request $request)
    {

        //validate user inputs
        $this->validate($request,[
        'id'=>'required|int',
        'quantity'=>'required|int|min:1|max:100']);  

        $item = Item::find($request->id);
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($item,$request->id,$request->quantity);
        $request->session()->put('cart',$cart);
        return Redirect::to(URL::previous() . "#menu");
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
