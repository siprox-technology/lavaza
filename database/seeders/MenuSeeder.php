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
            ],
        );
        Menu::create(
            [
                'name' => 'Side',
            ]
        );
        Menu::create(
            [
                'name' => 'Drinks',
            ]
        );
        Menu::create(
            [
                'name' => 'Main',
            ]
        );
    }
}
