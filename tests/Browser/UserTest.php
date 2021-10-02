<?php

namespace Tests\Browser;

use Carbon\Carbon;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    //test register user with correct inputs (email)
    public function test_new_user_can_be_registered_with_email_and_added_to_db()
    {

        $this->browse(function ($browser){
            $browser->visit('/')->visit('/register')
            ->assertPathIs('/register')
            ->assertSee('ایجاد حساب کاربری')
                    ->type('name', 'تست')
                    ->type('email', 'test@gmail.com')
                    ->type('phone', '11111111111')
                    ->type('password', '1111')
                    ->type('password_confirmation', '1111')
                    ->press('ثبت نام')
                    ->assertPathIs('/dashboard')
                    ->assertSee('لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید')
                    ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(1, User::where('name','=','تست')->get()->count());
    }
    //test register user with correct inputs (phone)
/*     public function test_new_user_can_be_registered_with_phone_and_added_to_db()
    {
    
    } */
    //test login with correct credentials
    public function test_login_and_logout_with_correct_credentials()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '1111')
                    ->press('ورود')
                    ->assertPathIs('/dashboard')
                    ->assertSee('لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید')
                    ->click('@Logout')->assertPathIs('/');
                    
        });
        $this->assertEquals(true,DB::table('users')->where('name','=','تست')->delete());
    }

    //test user can reset password with their phone
/*     public function user_can_reset_password_with_phone()
    {
        
    } */
    
}
