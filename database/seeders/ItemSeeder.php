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
        //Starter
        Item::create([
            'menu_id'=>(DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name'=>'Sampler',
            'name_fa'=>'سمپلر',
            'ingredients' =>'Beef nachos with tomatos chicken quesadilas and chicken flautas on a bed of lettuce with cheese sauce, sour cream and guacamore',
            'ingredients_fa'=>'ناچو گوشت گوساله به همراه فیله مرغ کاهو و سس پنیر',
            'price' => 11.25,
            'stock' => null,
        ]);
        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Guacamalo Mexicano',
            'name_fa'=>'گواکامالو مکزیکو',
            'ingredients' => 'Avocado, Tomatos, jalapeno, Coriander, Lime',
            'ingredients_fa'=>'اووکادوو گوجه فرنگی هالوپینو کوریاندر لیمو',
            'price' => 8.25,
            'stock' => null
        ]);
        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Buffalo Wings',
            'name_fa' => 'بوفالو وینگز',
            'ingredients' => 'Chicken wings, Hot sauce, Butter, Vinegar, Paprika, Ground chili',
            'ingredients_fa'=>'بال مرغ سس چیلی سرکه پاپریکا فلفل سیاه',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Chicken Fingers',
            'name_fa'=>'چیکن فینگرز',
            'ingredients' => 'Chicken breast, Cheese, Bread crums, eggs',
            'ingredients_fa'=>'سینه مرغ پنیر تخم مرغ پوره تست',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Stuffed Jalapenos',
            'name_fa' => 'هالوپینو کبابی',
            'ingredients' => 'Jalapeno, Onlion, Cream cheese',
            'ingredients_fa'=>'هالوپینو پیاز پنیر خامه ای',
            'price' => 6.99,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Texas Dip',
            'name_fa' => 'دیپ تگزاس',
            'ingredients' => 'A rich blend of grilled schrimp, Beef, Chicken, Special salsa',
            'ingredients_fa' => 'مخلوطی از میگو گریل شده گوشت گاو گوشت مرغ سالسای مخصوص',
            'price' => 9.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Starter')->pluck('id'))[0],
            'name' => 'Chicken Dip',
            'name_fa' => 'دیپ مرغ',
            'ingredients' => 'Original red hot sauce, Sour cream, Cream cheese, Cheddar cheese, Green onion',
            'ingredients_fa' => 'سس قرمز چیلی خامه پنیر خامه ای پنیر چدار پیاز',
            'price' => 9.50,
            'stock' => null
        ]);
    
        //Side

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Secar Salad',
            'name_fa'=>'سس سزار',
            'ingredients' => 'Lettuce, Parmesan cheese, Crisp croutons, Salad dressing',
            'ingredients_fa' =>'کاهو پنیر پارمسان کروتون سس سزار',
            'price' => 11.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Four Seasons Super Salad',
            'name_fa'=>'سوپر سالاد فصل',
            'ingredients' => 'Brown rice, Broccoli, Green shallot(s), Carrot, coarsely grated, Olive oil, Lemon juice, Avocado, Reduced fat feta cheese',
            'ingredients_fa' =>'برنج بروکلی پیازچه هویج روغن زیتون اووکادو پنیر فتا',
            'price' => 12.50,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Side')->pluck('id'))[0],
            'name' => 'Frech Fries',
            'name_fa'=>'سیب زمینی',
            'ingredients' => 'Fresh potatoes, Vinegar, Salt',
            'ingredients_fa'=>'سیب زمینی تازه به هراه سرکه و نمک',
            'price' => 7.50,
            'stock' => null
        ]);

        //Drinks

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Drinks')->pluck('id'))[0],
            'name' => 'Coca cola can',
            'name_fa'=>'نوشابه کوکا قوطی',
            'ingredients' => '330 ml',
            'ingredients_fa'=>'۳۳۰ میلی',
            'price' => 1.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Drinks')->pluck('id'))[0],
            'name' => 'Sprite can',
            'name_fa'=>'نوشابه اسپرایت قوطی',
            'ingredients' => '330 ml',
            'ingredients_fa'=>'۳۳۰ میلی',
            'price' => 1.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Drinks')->pluck('id'))[0],
            'name' => 'Fanta can',
            'name_fa'=>'نوشابه فانتا قوطی',
            'ingredients' => '330 ml',
            'ingredients_fa'=>'۳۳۰ میلی',
            'price' => 1.5,
            'stock' => null
        ]);

        //Main

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Beef Burger',
            'name_fa'=>'بیف برگر',
            'ingredients' => 'Beef, Onions, Tomatoes, Lettuce, Ketchup, Mayo, Mustard',
            'ingredients_fa'=>'گوشت گوساله گوجه فرنگی کاهو کچاپ مایونز سس خردل',
            'price' => 20.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Spicy Tandoori',
            'name_fa'=>'تاندوری برگر اسپایسی',
            'ingredients' => 'Tandoori Chicken, Chedder Cheese, Grilled Onion, & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo',
            'ingredients_fa'=>'مرغ تاندوری پنیر چدار پیاز گریل شده و چوجه فرنگی کاهو خیار شور سس سیر مایونز',
            'price' => 21.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Cheese Burger',
            'name_fa'=>'چیز برگر',
            'ingredients' => 'Beef Patty, Cheddar Cheese, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo,',
            'ingredients_fa'=>'گوشت گوساله پنیر چدار پیاز و گوجه تنوری خیار شور کاهو کچاپ مایونز خردل',
            'price' => 22.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Spicy Buffalo',
            'name_fa'=>'بوفالو برگر اسپایسی',
            'ingredients' => 'Crispy Chicken, Mozza Cheese, Grilled Onion & Tomatoes, Lettuce, Garlic Sauce, Buffalo Sauce, Mayo',
            'ingredients_fa'=>'مرغ سوخاری برشته پنیر موزا پیاز و گوجه گریل شده کاهو سس سیر سس بوفالو مایونز',
            'price' => 23.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Beef bacon',
            'name_fa'=>'بیف بیکن برگر',
            'ingredients' => 'Beef Patty, Chedder Cheese, Beef Bacon, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo, Mustard',
            'ingredients_fa'=>'گوشت گوساله پنیر چدار بیکن پیاز و گوجه کریل شده خیار شور کاهو کچاپ مایونز خردل',
            'price' => 21.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'BBQ Chicken',
            'name_fa'=>'باربکیو چیکن',
            'ingredients' => 'Grilled chicken, Mozza Cheese, Grilled Onlion, Lettuce, Mayo, BBQ Sauce',
            'ingredients_fa'=>'مرغ گریل شده پنیر موزا کاهو مایونز سس باربکیو',
            'price' => 24.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Creamy Mushroom',
            'name_fa'=>'برگر قارچ خامه ای',
            'ingredients' => 'Beef Patty, Cream of Musgroom, Mozza Cheese, Grilled Onions, Mayo',
            'ingredients_fa'=>'‌گوشت گوساله قارچ خامه ای پنیر موزا پیاز گریل شده مایونز',
            'price' => 23.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Crispy Chicken',
            'name_fa'=>'کریسپی چیکن',
            'ingredients' => 'Crispy Chicken, Cheddar Cheese, Grilled Onion & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo, Chipotle Sauce',
            'ingredients_fa'=>' مرغ سوخاری برشته پنیر چدار پیاز و گوجه گریل شده کاهو خیارشور سس سیر مایونز سس سس چیپوتل',
            'price' => 28.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Hawaiian Burger',
            'name_fa'=>'برگر هاوایی',
            'ingredients' => 'Beef Patty, Grilled Pineapple Mozza, Cheese, Onions, Tomatoes, Lettuce, Mayo, BBQ Sauce',
            'ingredients_fa'=>'گوشت گوساله اناناس گریل شده پنیر موزا پیاز چوجه فرنگی کاهو مایونز سس باربکیو',
            'price' => 23.5,
            'stock' => null
        ]);

        Item::create([
            'menu_id' => (DB::table('menus')->where('name', 'Main')->pluck('id'))[0],
            'name' => 'Chicken Paradise',
            'name_fa'=>'چیکن پارادایس',
            'ingredients' => 'Grilled Chicken, Mozza Cheese, Grilled Pineapple, Lettuce, Onions, Jalapenos, Mayo, Garlic Sauce',
            'ingredients_fa'=>'مرغ کریسپی پنیر موزا اناناس گریل شده کاهو پیاز هالوپینو مایونز سس سیر',
            'price' => 32.5,
            'stock' => null
        ]);
    }
}
