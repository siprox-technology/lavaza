<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(
            [
                'name' => 'Starter',
                'name_fa'=>'استارتر'
            ],
        );
        Menu::create(
            [
                'name' => 'Side',
                'name_fa'=>'ساید'
            ]
        );
        Menu::create(
            [
                'name' => 'Drinks',
                'name_fa'=> 'نوشیدنی ها'
            ]
        );
        Menu::create(
            [
                'name' => 'Main',
                'name_fa'=>'غذای اصلی'
            ]
        );
    }
}
