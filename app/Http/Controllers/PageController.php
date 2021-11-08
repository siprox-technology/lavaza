<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;
/* use Trez\RayganSms\Facades\RayganSms; */

class PageController extends Controller
{
    public function showHomePage()
    {
        //get menus and items
        $items = Item::all();
        $menus = Menu::all();

/*         dd(RayganSms::sendMessage('09371373929','Test Message')); */
        return view('index')->with(['items'=>$items, 'menus'=>$menus]);
    }
}
