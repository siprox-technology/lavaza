<?php

namespace Tests\Browser;

use App\Models\Item;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{
    //admin login with correct credentials 
    public function test_admin_can_login_with_correct_credentials(){
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')
                    ->type('password', '1111')
                    ->press('@submit_btn')
                    ->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->click('@Logout')->assertPathIs('/');
        });
    }
    //admin can update user detais
    public function test_admin_update_user_details()
    {
        //create test user
        $testUser = User::create(
            [
            'name' => 'تست',
            'email' => 'test@gmail.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')->type('password', '1111')
                    ->press('@submit_btn')->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->clickLink('اطلاعات سیستم')->clickLink('کاربرها')
                    ->pause('1000')->assertSee('test@gmail.com')
                    ->press('@updateUser_Link ')->assertSee('ویرایش اطلاعات کاربر')
                    ->value('#name', 'تست')->type('name', 'تست شده')
                    ->type('phone', '11111111111')->type('address','ادرس تست شده')
                    ->press('@submit_btn')->assertSee('ویرایش کاربر انجام شد')
                    ->click('@Logout')->assertPathIs('/');    
        });
        $this->assertEquals(true, User::where('name','=','تست شده')
        ->where('phone','11111111111')->delete()); 
    }
    //admin can delete a user 
    public function test_admin_can_delete_a_user()
    {
        //create test user
        $testUser = User::create(
            [
            'name' => 'تست',
            'email' => 'test@gmail.com',
            'phone' => rand(11111111,9999999999),
            'password' => Hash::make('1111'), // password
            ]
        );
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')->type('password', '1111')
                    ->press('@submit_btn')->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->clickLink('اطلاعات سیستم')->clickLink('کاربرها')
                    ->pause('1000')->assertSee('test@gmail.com')
                    ->press('@deleteUser_btn ')
                    ->assertPathIs('/admin')
                    ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(0, User::where('name','=','تست')->get()->count());
    }

    //admin add a menu item
    public function test_admin_can_add_menu_item()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')->type('password', '1111')
                    ->press('@submit_btn')->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->click('@editMenu_link')->assertPathIs('/admin/menu-items')
                    ->click('@newItem_link')->assertPathIs('/admin/menu-items/create')
                    ->select('@menuName_select','Starter')
                    ->type('name_fa', 'غذای تست')
                    ->type('name', 'test food')
                    ->type('ingredients_fa','مواد تشکیل دهنده غذا')
                    ->type('price','11.5')
                    ->type('stock','25')->press('@submit_btn')->pause('2000')
                    ->assertSee('ایتم جدید اضافه شد');
                    
        });

    }
    //admin update a menu item
    public function test_admin_can_update_menu_items_details()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')->type('password', '1111')
                    ->press('@submit_btn')->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->click('@editMenu_link')->assertPathIs('/admin/menu-items')
                    ->click('@editItem_link ')->assertSee('ویرایش ایتم')
                    ->type('name', 'test changed')->type('name_fa','غذای تست تغییر')
                    ->type('ingredients_fa','مواد تشکیل دهنده تغییر')
                    ->type('price','99')->type('stock','99')->press('@submit_btn');
            });

            $this->assertEquals(1, Item::where('name','=','test changed')
            ->where('price','99')->get()->count());
    }
    //admin remove a menu item

    public function test_admin_deletes_menu_items()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'siproxtech@gmail.com')->type('password', '1111')
                    ->press('@submit_btn')->assertPathIs('/admin')
                    ->assertSee('پنل ادمین')
                    ->assertSee('اطلاعات سیستم')
                    ->click('@editMenu_link')->assertPathIs('/admin/menu-items')
                    ->press('@deleteItem_btn ');
            });
            $this->assertEquals(0, Item::where('name','=','test changed')
            ->where('price','99')->get()->count());
    }
}

