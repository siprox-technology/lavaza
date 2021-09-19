<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('auth.dashboard');
    }

    public function saveUserAddress(Request $request)
    {
        //validate delivery_price, address
        $this->validate($request,[
            'address'=>'required|string|regex:/([آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی 1234567890]+$)/',
        ]);
        //save new address to DB

        $user = User::find(auth()->user()->id);
        $user->address = $request->address;
        $user->save();

        return back();
    }
    public function deleteUserAddress()
    {
        $user = User::find(auth()->user()->id);
        $user->address = null;
        $user->save();
        return back();
    }
}
