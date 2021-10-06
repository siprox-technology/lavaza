<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'name' => 'سروش مدرسی',
            'email' => 'siproxtech@gmail.com',
            'phone' => rand(11111111,9999999999),
            'role'=>'1',
            'password' => Hash::make('1111'), // password
            ]
        );
        User::create(
            [
            'name' => 'نکیسا رهنورد',
            'email' => 'email@email.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
        User::create(
            [
            'name' => 'احمد احمدی',
            'email' => 'ahmad@email.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
        User::create(
            [
            'name' => 'مهران زاهدی',
            'email' => 'mshadow73@gmail.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            'address' =>'بولوار دانشجو ۴۵ پلاک ۶۷۵'
            ]
        );
    }
}
