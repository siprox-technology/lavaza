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
            'name' => 'Soroosh Modarresi',
            'email' => 'siproxtech@gmail.com',
            'phone' => rand(11111111,9999999999),
            'role'=>'1',
            'password' => Hash::make('1111'), // password
            ]
        );
        User::create(
            [
            'name' => 'Jonh Doe',
            'email' => 'email@email.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
        User::create(
            [
            'name' => 'ahmad Doe',
            'email' => 'ahmad@email.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
    }
}
