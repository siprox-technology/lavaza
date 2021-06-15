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

    public function deleteUser(Request $request)
    {
        User::find($request->user_id)->delete();
        $users = User::all();
        return redirect()->route('admin.index','#main')->with(['users'=>$users, 'databaseMenu'=>'users']);
    }

    public function updateUser(Request $request){
        //validate user inputs
        $this->validate($request,[
            'name'=>'max:50',
            'phone'=>'digits:11',
            'address'=>'max:150',
            'city'=>'max:50',
            'state'=>'max:30',
            'country'=>'max:30',
            'post_code'=>'max:15',
        ]);
            //update user details

            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->contact_pref;
            $user->state = $request->contact_pref;
            $user->country = $request->contact_pref;
            $user_country = $request->country;
            $user->save();
            $users = User::all();
            return redirect()->route('admin.index','#main')->with(['users'=>$users, 'databaseMenu'=>'users']);

    }
}
