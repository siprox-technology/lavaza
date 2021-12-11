<?php

namespace App\Http\Controllers;
use App\Models\OnlineShop;
use Illuminate\Http\Request;

class OnlineShopController extends Controller
{
    public function index(){
        $onlineShop = OnlineShop::all();
        return view('auth.admin.onlineShop.index')->with(['onlineShop'=>$onlineShop]);
    }
}
