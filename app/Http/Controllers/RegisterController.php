<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request)
    {
  dd('here');
        //validate user inputs
/*         $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|digits:11',
            'password'=>'required|confirmed',
            'contact_pref'=>'required|integer|between:0,2'
        ]); */
        //create user 
/*         $user = User::create(
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "password"=>Hash::make($request->password),
                "contact_pref"=>$request->contact_pref
            ]
        );

        event(new Registered($user));
        Auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard.index'); */
    }
}
