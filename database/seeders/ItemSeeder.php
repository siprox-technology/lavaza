<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Sampler',
            'ingredients' => 'Beef nachos with tomatos chicken quesadilas and chicken flautas on a bed of lettuce with cheese sauce, sour cream and guacamore',
            'price' => 11.25,
            'stock' => null
        ]);
        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Guacamalo_Mexicano',
            'ingredients' => 'Avocado, Tomatos, jalapeno, Coriander, Lime',
            'price' => 8.25,
            'stock' => null
        ]);
        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Buffalo_Wings',
            'ingredients' => 'Chicken wings, Hot sauce, Butter, Vinegar, Paprika, Ground chili',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Chicken_Fingers',
            'ingredients' => 'Chicken breast, Cheese, Bread crums, eggs',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Stuffed Jalapenos',
            'ingredients' => 'Jalapeno, Onlion, Cream cheese',
            'price' => 6.99,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Texas Dip',
            'ingredients' => 'A rich blend of grilled schrimp, Beef, Chicken, Special salsa',
            'price' => 9.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Chicken Dip',
            'ingredients' => 'Original red hot sauce, Sour cream, Cream cheese, Cheddar cheese, Green onion',
            'price' => 9.50,
            'stock' => null
        ]);
    
        //Side

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Secar Salad',
            'ingredients' => 'Lettuce, Parmesan cheese, Crisp croutons, Salad dressing',
            'price' => 11.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Four Seasons Super Salad',
            'ingredients' => 'Brown rice, Broccoli, Green shallot(s), Carrot, coarsely grated, Olive oil, Lemon juice, Avocado, Reduced fat feta cheese',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Frech Fries',
            'ingredients' => 'Fresh potators, Vinegar, Salt',
            'price' => 7.50,
            'stock' => null
        ]);

    }
}
