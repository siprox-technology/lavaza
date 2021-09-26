<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //1.users
            UserSeeder::class,
            //2.menu
/*             MenuSeeder::class, */
            //3.items
/*             ItemSeeder::class */
            
        ]);
    }
}
