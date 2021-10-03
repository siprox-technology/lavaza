<?php

namespace Tests\Browser;

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
                    ->press('@updateUse_Link ')->assertSee('ویرایش اطلاعات کاربر')
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

}

