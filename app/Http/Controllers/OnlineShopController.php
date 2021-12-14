<?php

namespace App\Http\Controllers;
use App\Models\OnlineShop;
use Illuminate\Http\Request;

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
    public function isShopOpen()
    {
        //

    }

    
}
