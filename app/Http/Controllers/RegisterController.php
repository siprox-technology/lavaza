<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\NewUserRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Trez\RayganSms\Facades\RayganSms;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

class RegisterController extends Controller
{    
    public function __construct()
    {
        $this->middleware(['guest'])->only('index','store');
        $this->middleware(['auth','signed'])->only('verifyEmail','sendVerifySMS');
        $this->middleware(['auth','throttle:6,1'])->only('sendVerifyEmail','sendVerifySMS');
    }
    public function index(){
        return view('register');
    }
    public function store(Request $request)
    {
        //farsi only alphabets
        $farsi_only_alphabets = '\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';
    
        //validate user inputs
        $validate_status = $this->validate($request,[
            'name'=>'required|max:50|regex:/^['.$farsi_only_alphabets.']*$/u',
            'phone'=>'required|digits:11',
            'email'=>'email|nullable',
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
        if($request->email)
        {
            event(new Registered($user));
            Auth()->attempt($request->only('email','password'));
        }
        //send sms verification code
        $code = rand(10001,99999);
        //check if sent
        if(RayganSms::sendMessage($request->phone,$code." کد تایید برای فروشگاه لاوازا "))
        {
            $request->session()->put(['code'=>$code,'generation_time'=>Carbon::now()->toTimeString()]);
        }
        return redirect()->route('dashboard.index');
    }
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard');
    }
    public function verifySMS(Request $request)
    {
        $this->validate($request,[
            'code'=>'required|digits:5',
        ]);
        //check time and code
        $time_now = Carbon::now()->toTimeString();
        $code_generated_time = $request->session()->get('generation_time');
        $code = $request->session()->get('code');//

        if((strtotime($time_now)-strtotime($code_generated_time))<300){
            $user = auth()->user();
            $user->phone_verified_at = Carbon::now()->toDateTimeString();
            $user->save();
            return redirect('/dashboard');
        }
        
        return redirect('/dashboard')->with(['status'=>'کد مورد نظر منقضی شده. لطفا دوباره درخواست نمایید']);
    }
    public function sendVerifyEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'لینک تایید به ایمیل شما ارسال شد');
    }
    public function reSendVerifySMS(Request $request)
    {
/*         dd($request); */
        $code = rand(10001,99999);
        if(RayganSms::sendMessage($request->phone,$code." کد تایید برای فروشگاه لاوازا "))
        {
            $request->session()->put(['code'=>$code,'generation_time'=>Carbon::now()->toTimeString()]);
            return back()->with('status', 'کد تایید به شماره شما ارسال شد');
        }
        return back()->with('status', 'کد تایید به شماره شما ارسال نشد');
    }

    function convertPersianNumbersToEnglish($input)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  4 ,  5 ,  5 ,  6 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($persian, $english, $input);
    }
}
