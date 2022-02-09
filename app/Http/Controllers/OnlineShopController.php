<?php

namespace App\Http\Controllers;
use App\Models\OnlineShop;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Validation\Rule;

class OnlineShopController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    private function isAdminLoggedIn(){
        return auth()->user()->role == 1 ? true : false;
    }

    public function index(){
        if($this->isAdminLoggedIn())
        {
            $onlineShopSetting = OnlineShop::find(1);
            return view('auth.admin.onlineShop.index')->with(['onlineShopSetting'=>$onlineShopSetting]);
        }
        return redirect()->route('home');
    }
    public function updateStatus(Request $request){
        if($this->isAdminLoggedIn())
        {
            $this->validate($request,[
                'is_open'=>'required|boolean',
            ]);
            $onlineShopSetting = OnlineShop::find(1);
            $onlineShopSetting->is_open = $request->is_open;
            $onlineShopSetting->save();
            return back()->with(['status'=>'وضعیت فروشگاه بروز رسانی شد','onlineShopSetting'=>$onlineShopSetting]);
        }
        return back();
    }
    public function updateOrdersStatus(Request $request)
    {
        if($this->isAdminLoggedIn())
        {
            $this->validate($request,[
                'order-numbers'=>'required|array',
                'ordersStatus' =>['required',Rule::in(['process', 'cancel'])]
            ]);
            $ordersToUpdate = $request['order-numbers'];
            foreach($ordersToUpdate as $key=>$orderNumber)
            {
                $order = Order::find($orderNumber);
                $order->status = ($request->ordersStatus) == 'process'?
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
        return back();
    }
    public function OrdersIndex()
    {
        return $this->isAdminLoggedIn()=== true ? 
        view('auth.admin.onlineShop.orders.index'):
        redirect()->route('home');
    }
    public function OrdersHistoryIndex()
    {
        return $this->isAdminLoggedIn()=== true ? 
        view('auth.admin.onlineShop.orders.history'):
        redirect()->route('home');
    }
    public function getOrdersData(Request $request){

        $this->validate($request, ['order_date_from'=>'nullable|max:10|regex:/^[0-9]{4}\/[0-9]{1,2}\/[0-9]{1,2}$/',
        'order_date_to'=>'nullable|max:10|regex:/^[0-9]{4}\/[0-9]{1,2}\/[0-9]{1,2}$/',
        'orders_status'=>'required',Rule::in(['all', 'processed','pending','canceled'])
        ]);

        if($this->isAdminLoggedIn()){
            if($request->order_date_from && $request->order_date_to)
            {
                //convert to English date
                $request->order_date_from = Jalalian::fromFormat('Y-m-d H:i:s',str_replace('/','-',$request->order_date_from) .' 00:00:00')->toCarbon()->toDateTimeString();
                $request->order_date_to = Jalalian::fromFormat('Y-m-d H:i:s',str_replace('/','-',$request->order_date_to).' 23:59:00')->toCarbon()->toDateTimeString();
            }
            if($request->orders_status =='all')
            {
                $orders = ($request->order_date_from && $request->order_date_to) ?
                Order::all()
                ->where('created_at','>=',$request->order_date_from)
                ->where('created_at','<=',$request->order_date_to)
                :
                Order::all();
            }
            else
            {
                $orders = ($request->order_date_from && $request->order_date_to) ?
                Order::where('status','=',$request->orders_status)
                ->where('created_at','>=',$request->order_date_from)
                ->where('created_at','<=',$request->order_date_to)
                ->get()
                :
                Order::where('status','=',$request->orders_status)
                ->get();
            }
            foreach($orders as $order)
            {
                $order->created_at = Jalalian::fromDateTime($order->created_at)->toString();
                $order->updated_at = Jalalian::fromDateTime($order->updated_at)->toString();
                $order->order_items;
            }
            return json_encode($orders->toArray());
        }
        return back();
    }

}

