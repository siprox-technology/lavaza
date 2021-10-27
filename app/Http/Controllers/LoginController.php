<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {        
        //validate user
       $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required'
            ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember))
        {
            return back()->withErrors(['status'=>'نام کاربری یا رمز عبور اشتباه است']);
        }
        //login for admins
        if(auth()->user()->role == 1)
        {
            return \redirect()->route('admin.index');
        }

        return \redirect()->route('dashboard.index');
    }
    public function logOut()
    {
            auth()->logout();
            return \redirect()->route('home');
    }
}
