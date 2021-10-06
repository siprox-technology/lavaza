<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    
    //Display a listing of the reservations.

    public function index()
    {
        //default is date is today's reservation
        $date = str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]);
        $reservations = Reservation::get()
        ->where('date',$date);
        //format today date to 00/00/0000
        $today = str_replace(' ','/',$date);
        return view('auth.admin.reservation.index')->with(['reservations'=>$reservations,'date'=>$date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name', 'desc')
        ->get();
        return view('auth.admin.reservation.create')->with(['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    //Display the specified resevations by date.
    public function show(Request $request)
    {
        $this->validate($request,[
            'date'=>'required|string|max:10|regex:/([1234567890 ]+$)/'
        ]);
        //convert date to 00 00 0000 format
        $date = str_replace('/',' ',$request->date);

        //retrive all reservations by date
        $reservations = Reservation::get()
        ->where('date',$date);
        //format date to 00/00/0000
        $date = str_replace(' ','/',$date);
        return view('auth.admin.reservation.index')->with(['reservations'=>$reservations,'date'=>$date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
