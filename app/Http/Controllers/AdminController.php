<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

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

    //User model update and delete
    
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
        return view('auth.admin.menuItemsIndex')->with(['menus'=>$menus]);
    }


}
