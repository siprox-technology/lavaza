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
}
