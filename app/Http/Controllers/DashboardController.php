<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('auth.dashboard.index');
    }

    public function updateUserDetailsIndex()
    {
        return view('auth.dashboard.edit-user-details');
    }
    public function updateUserDetails(Request $request)
    {
        //validate user inputs

        //farsi alphabets with numbers in farsi and english
        $farsi_alphabets_english_digits = '\x{06F0}-\x{06F9}\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';
       //farsi only alphabets
        $farsi_only_alphabets = '\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';

        $this->validate($request,[
            'name'=>'required|max:50|regex:/^['.$farsi_only_alphabets.']*$/u',
            'phone'=>'digits:11',
            'address'=>'string|max:511|regex:/^['.$farsi_alphabets_english_digits.'{0-9}'.']*$/u|nullable',
        ]);
        
            //update user details
            $user = auth()->user();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return back()->with(['status'=>'جزییات کاربر ویرایش شد']);
    }
    public function saveUserAddress(Request $request)
    {
        //validate delivery_price, address
        $this->validate($request,[
            'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
        ]);
        //save new address to DB

        $user = User::find(auth()->user()->id);
        $user->address = $request->address;
        $user->save();

        return back();
    }
    public function deleteUserAddress()
    {
        $user = User::find(auth()->user()->id);
        $user->address = null;
        $user->save();
        return back();
    }

    public function displayOrderHistory()
    {
        $orders = Order::get()->where('user_id',auth()->user()->id);
        foreach($orders as $order)
        {
            $order->created_at = Jalalian::fromDateTime($order->created_at)->toString();
            $order->updated_at = Jalalian::fromDateTime($order->updated_at)->toString();
        }
        return view('orders.order-history')->with(['orders'=>$orders]);
    }

    public function orderPastOrders(Request $request)
    {
        //validate delivery_price, address
        $this->validate($request,[
            'id'=>'required|integer',
        ]);
        //clear shopping basket
        Session::forget('cart');

        //retrieve order items
        $order_items = Order::find($request->id)->order_items;
        //create new shopping cart
        $cart = new Cart(null);
        foreach($order_items as $order_item)
        {
            $item = Item::where('name',$order_item->name)->get();
            $cart->add($item[0],$item[0]->id,$order_item->quantity);
        }

        //add cart to session
        $request->session()->put('cart',$cart);
        //redirect to order page
        return redirect()->route('order.index');
    }
}
