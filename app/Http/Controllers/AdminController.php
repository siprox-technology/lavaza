<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\DB;
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
    public function updateMenuItemsImage(Request $request)
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
        return back()->with(['noCache'=>'true']); 
    }
    public function updateMenuItemsDetailsIndex($item_name)
    {

        $rules = ['name_fa' => 'regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/'];
        $input = ['name_fa' => $item_name];

        if(Validator::make($input, $rules)->passes())
        {
            $item = Item::where('name_fa',$item_name)->first();
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
                ['status'=>'ویرایش ایتم با موفقیت انجام شد']
            );
    }

    public function createMenuItemsIndex()
    {
        return view('auth.admin.createMenuItem');
    }
    public function createMenuItems(Request $request)
    {

        //validate item inputs
        $this->validate($request,[
            'menu_name'=>'required|string|regex:/([A-Z,a-z]+$)/',
            'name'=>'string|max:128|regex:/([A-Z,a-z]+$)/|nullable',
            'name_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'ingredients_fa'=>'required|string|max:511|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی ]+$)/',
            'price'=>'required|string|regex:/([1234567890]+$)/',
            'stock'=>'string|regex:/([1234567890]+$)/|nullable'
        ]);
        //create item
        $item = Item::create([
            'menu_id'=>(DB::table('menus')->where('name', $request->menu_name)->pluck('id'))[0],
            'name'=>$request->name,
            'name_fa'=>$request->name_fa,
            'ingredients' =>null,
            'ingredients_fa'=>$request->ingredients_fa,
            'price' => $request->price,
            'stock' => 11,
        ]);
        if($item)
        {
            return back()->with(['status'=>'ایتم جدید اضافه شد']);
        }

        return back()->with(['status'=>'امکان اضافه کردن ایتم جدید وجود ندارد']);

    }
}
