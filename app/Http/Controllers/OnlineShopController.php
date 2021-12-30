<?php

namespace App\Http\Controllers;
use App\Models\OnlineShop;
use App\Models\Order;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class OnlineShopController extends Controller
{
    public function index(){
        $onlineShopSetting = OnlineShop::find(1);
        return view('auth.admin.onlineShop.index')->with(['onlineShopSetting'=>$onlineShopSetting]);
    }

    public function updateStatus(Request $request){

        $this->validate($request,[
            'is_open'=>'required|boolean',
        ]);
        $onlineShopSetting = OnlineShop::find(1);
        $onlineShopSetting->is_open = $request->is_open;
        $onlineShopSetting->save();
        return back()->with(['status'=>'وضعیت فروشگاه بروز رسانی شد','onlineShopSetting'=>$onlineShopSetting]);
    }
    public function pendingOrdersIndex()
    {
        $pendingOrders = Order::get()->where('status','=','pending');
        foreach($pendingOrders as $order)
        {
            $order->created_at = Jalalian::fromDateTime($order->created_at)->toString();
            $order->updated_at = Jalalian::fromDateTime($order->updated_at)->toString();
        }
        return view('auth.admin.onlineShop.orders.pending')->with(['pendingOrders'=>$pendingOrders]);
    }

    public function updateOrdersStatus(Request $request)
    {
        $this->validate($request,[
            'order-numbers'=>'required|array',
            'ordersStatus' =>'required|string|max:8'
        ]);
        $ordersToUpdate = $request['order-numbers'];
        foreach($ordersToUpdate as $key=>$orderNumber)
        {
            $order = Order::find($orderNumber);
            $order->status = ($request->ordersStatus)== 'process'?
            'processed':'canceled';
            $order->save();
        }
        return back();
    }
}
