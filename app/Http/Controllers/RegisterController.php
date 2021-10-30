<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\NewUserRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{    
    public function __construct()
    {
        $this->middleware(['guest'])->only('index','store');
        $this->middleware(['auth','signed'])->only('verifyEmail');
        $this->middleware(['auth','throttle:6,1'])->only('sendVerifyEmail');
    }
    public function index(){
        return view('register');
    }
    public function store(Request $request)
    {
        //farsi alphabets with numbers in farsi and english
        $farsi_alphabets_english_digits = '\x{06F0}-\x{06F9}\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';
        //farsi only alphabets
        $farsi_only_alphabets = '\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';
    
        //validate user inputs
        $validate_status = $this->validate($request,[
            'name'=>'required|max:50|regex:/^['.$farsi_only_alphabets.']*$/u',
            'phone'=>'digits:11',
            'address'=>'string|max:511|regex:/^['.$farsi_alphabets_english_digits.'{0-9}'.']*$/u|nullable',
            'password'=>'required|confirmed',
        ]);
        //create user 
        $user = User::create(
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$this->convertPersianNumbersToEnglish($request->phone),
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
        return back()->with('message', 'لینک تایید به ایمیل شما ارسال شد');
    }

    function convertPersianNumbersToEnglish($input)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  4 ,  5 ,  5 ,  6 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($persian, $english, $input);
    }
}
