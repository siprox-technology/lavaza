<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomePage()
    {
        //get menus and items
        $items = Item::all();
        $menus = Menu::all();
        return view('index')->with(['items'=>$items, 'menus'=>$menus]);
    }
    public function showMenuPage()
    {
        //get menus and items
        $items = Item::all();
        $menus = Menu::all();
        return view('menu')->with(['items'=>$items, 'menus'=>$menus]);
    }
}
