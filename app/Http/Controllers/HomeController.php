<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //get menus and items
        $items = Item::all();
        $menus = Menu::all();
        return view('index')->with(['items'=>$items, 'menus'=>$menus]);
    }
}
