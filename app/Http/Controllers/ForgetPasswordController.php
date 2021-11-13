<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Trez\RayganSms\Facades\RayganSms;
class ForgetPasswordController extends Controller
{
    public function construct()
    {
        $this->middleware(['guest']);
    }
    //forget password form
    public function index()
    {
        return view('auth.forget-pass');
    }
    public function sendResetPass(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'phone'=>'required|digits:11',
            'send_method'=>'required|digits:1'
        ]);
        
        /* user selected sms to receive the link */
        if($request->send_method == 0)
        {
            //creat sms link and send it to user phone
            $sms_link = route('password.reset',Password::createToken(Password::getUser($request->only('email','phone'))));
            if(RayganSms::sendMessage($request->phone,$sms_link))
            {
                return back()->with(['status'=>'لینک تغییر رمز عبور به شماره موبایل شما پیامک شد']);
            }
            return back()->with(['status'=>'ارسال لینک با مشکل مواجه شد. لطفا مجددا تلاش کنید']);
        }
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
    //reset password form
    public function showResetPassForm($token)
    {
        return view('auth.reset-pass', ['token' => $token]);
    }
    //reset password
    public function resetPass(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'phone'=>'required|digits:11',
            'password' => 'required|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email','phone', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );
        auth()->logout();
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login.index')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
