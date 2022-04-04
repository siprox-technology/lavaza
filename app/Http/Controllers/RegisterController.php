<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function store(PostRegisterRequest $request)
    {
        //create user
        $user = User::create(
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$this->convertPersianNumbersToEnglish($request->phone),
                "password"=>Hash::make($request->password),
            ]
        );
        $this->sendActivationCode_Link($request,$user);
        return redirect()->route('dashboard.index');
    }
    private function sendActivationCode_Link(Request $request, User $user)
    {
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
        $code = $request->session()->get('code');
        $inputCode = $request->code;
        if((strtotime($time_now)-strtotime($code_generated_time))<300 && $inputCode == $code){
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
        $code = rand(10001,99999);
        if(RayganSms::sendMessage($request->phone,$code." کد تایید برای فروشگاه لاوازا "))
        {
            $request->session()->put(['code'=>$code,'generation_time'=>Carbon::now()->toTimeString()]);
            return back()->with('status', 'کد تایید به شماره شما ارسال شد');
        }
        return back()->with('status', 'کد تایید به شماره شما ارسال نشد');
    }
    private function convertPersianNumbersToEnglish($input)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  4 ,  5 ,  5 ,  6 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($persian, $english, $input);
    }
}
