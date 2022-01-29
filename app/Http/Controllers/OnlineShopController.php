<?php

namespace App\Http\Controllers;
use App\Models\OnlineShop;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use PDF;

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
        // if order status == processed return in a new tab a page to print processed orders
        if($request['ordersStatus'] == 'processed')
        {
            //
        }
        //else
        return back();
    }
    public function OrdersIndex()
    {
/*         $orders = Order::get()->where('status','=','pending');
        $order_items = array();
        foreach($orders as $order)
        {
            $order->created_at = Jalalian::fromDateTime($order->created_at)->toString();
            $order->updated_at = Jalalian::fromDateTime($order->updated_at)->toString();
            array_push($order_items,$order->order_items);
        }
        $items = array($orders,$order_items); */
        return view('auth.admin.onlineShop.orders.index')/* ->with(['orders'=>$orders]) */;
    }
    public function getOrdersData(Request $request){

        $orders = Order::get()->where('status','=',$request->orders_status);
        foreach($orders as $order)
        {
            $order->created_at = Jalalian::fromDateTime($order->created_at)->toString();
            $order->updated_at = Jalalian::fromDateTime($order->updated_at)->toString();
            $order->order_items; //wow------

        }
        return json_encode($orders, JSON_UNESCAPED_UNICODE);
    }

}

