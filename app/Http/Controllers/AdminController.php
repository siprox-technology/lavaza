<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $users = User::all();
        return view('auth.admin.index')->with(['users'=>$users]);
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
            return back()->with(['status'=>'User updated successfully']);
    }
    public function deleteUser(Request $request)
    {
        User::find($request->user_id)->delete();
        $users = User::all();
        return redirect()->route('admin.index')
        ->with(['users'=>$users, 
        'users-database-list'=>'open',
        'status'=>'User ID: '.$request->user_id.' removed']);
    }

}
