<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request)
    {
        //validate user inputs
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|digits:11',
            'password'=>'required|confirmed',
        ]);
        //create user 
        $user = User::create(
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "password"=>Hash::make($request->password),
            ]
        );

        event(new Registered($user));
        Auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard.index');
    }
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard');
    }

    public function sendVerifyEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
