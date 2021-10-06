<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Reservation;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'16:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '12',
            'price' => null,
            'notes' => 'سالگرد ازدواج'
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'17:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '11',
            'price'=>null,
            'notes' => 'تولد'
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'18:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '8',
            'price' => null,
            'notes' => 'بدون شلوغی و مزاحمت'
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'19:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '5',
            'price'=>null,
            'notes' => null
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'20:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '2',
            'price'=>null,
            'notes' => 'قرار کاری'
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'21:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '1',
            'price'=>null,
            'notes' => null
        ]);
        Reservation::create([
            'date' =>str_replace('-',' ',explode(' ',Jalalian::fromDateTime(Carbon::now()))[0]),
            'time'=>'22:00',
            'user_id'=>(DB::table('users')->where('name', 'مهران زاهدی')->pluck('id'))[0],
            'table_number' => '4',
            'price'=>null,
            'notes' => 'ولنتاین با تزیینات'
        ]);
    }
}
