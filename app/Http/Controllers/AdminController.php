<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $users = User::all();
        $menus = Menu::all();
        foreach($menus as $menu)
        {
            $menu->created_at = Jalalian::fromDateTime($menu->created_at)->toString();
            $menu->updated_at = Jalalian::fromDateTime($menu->updated_at)->toString();
        }
        return view('auth.admin.index')->with(['users'=>$users, 'menus'=>$menus]);
    }

    public function updateUserIndex($userId)
    {
        $user = User::find($userId);
        return view('auth.admin.updateUser')->with(['user'=>$user]);
    }
    public function updateUser(Request $request){
        //validate user inputs
        $this->validate($request,[
            'name'=>'max:50',
            'phone'=>'digits:11',
            'address'=>'string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/|nullable',
        ]);

            //update user details
            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return back()->with(['status'=>'ویرایش کاربر انجام شد']);
    }
    public function deleteUser(Request $request)
    {
        User::find($request->user_id)->delete();
        return back()
        ->with(['users-database-list'=>'open',
        'status'=>'کاربر شماره: '.$request->user_id.' حذف شد']);
    }

    public function menuItemsIndex()
    {
        $menus = Menu::all();
        $items = Item::all();
        return view('auth.admin.menuItems')->with(['menus'=>$menus,'items'=>$items]);
    }
    public function deleteMenuItems(Request $request)
    {
        $this->validate($request,[
            'id'=>'required|regex:/([1234567890]+$)/'
        ]);
       $item = Item::find($request->id);
       $imageName = $item->name_fa.'.jpg';  
       Storage::disk('images')->delete('menu/'.$imageName);
       Cache::flush();
       $item->delete();
       return back()->with(['status'=>'ایتم مورد نظر حذف شد']);
    }
    public function updateMenuItemsImage(Request $request)/* fix refresh image */
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg|max:2048',
            'id'=>'required|regex:/([1234567890]+$)/'
        ]);
        $imageName = Item::find($request->id)->name_fa.'.jpg';  
        Storage::disk('images')->delete('menu/'.$imageName);
        $path = $request->file('image')->storeAs(
            'menu', $imageName,'images'
        );
        Cache::flush();
        return back(); 
    }
    public function updateMenuItemsDetailsIndex($item_name)
    {
        $rules = ['name_fa' => 'regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/'];
        $input = ['name_fa' => $item_name];

        if(Validator::make($input, $rules)->passes())
        {
            $item = Item::get()->where('name_fa',$item_name);
            return view('auth.admin.updateMenuItems')->with(['item'=>$item]);
        }
        return back();
    }

    public function updateMenuItemsDetails(Request $request)
    {
        //validate item inputs
        $this->validate($request,[
            'id'=>'required|regex:/([1234567890]+$)/',
            'name'=>'string|max:128|regex:/([A-Z,a-z]+$)/|nullable',
            'name_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'ingredients_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'price'=>'required|string|regex:/([1234567890]+$)/',
            'stock'=>'string|regex:/([1234567890]+$)/|nullable'
        ]);
            //update item details
            $menu_item = Item::find($request->id);
            $menu_item->name = $request->name;
            $menu_item->name_fa = $request->name_fa;
            $menu_item->ingredients_fa = $request->ingredients_fa;
            $menu_item->price = $request->price;
            $menu_item->stock = $request->stock;
            $menu_item->save();
            return back()->with(
                ['status'=>' ویرایش ایتم با موفقیت انجام شد ']
            );
    }

    public function createMenuItemsIndex()
    {
        return view('auth.admin.createMenuItem');
    }
    public function createMenuItems()
    {
        dd($request);
        //validate item inputs /* her */
        $this->validate($request,[
            'menu_name'=>'required|string|regex:/([A-Z,a-z]+$)/',
            'name'=>'string|max:128|regex:/([A-Z,a-z]+$)/|nullable',
            'name_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'ingredients_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'price'=>'required|string|regex:/([1234567890]+$)/',
            'stock'=>'string|regex:/([1234567890]+$)/|nullable'
        ]);

    }
}
