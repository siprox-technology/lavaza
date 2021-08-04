<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //starter
        Item::create([
            'menu_id'=>(DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Samplere',
            'ingredients' => 'Beef nachos with tomatos chicken quesadilas and chicken flautas on a bed of lettuce with cheese sauce, sour cream and guacamore',
            'price' => 11.25,
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        

        //side

        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        //drinks

        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
        //main

        Item::create([
            'menu_id' => '',
            'name' => '',
            'ingredients' => '',
            'price' => '',
            'stock' => ''
        ]);
    }
}
