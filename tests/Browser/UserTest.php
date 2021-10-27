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
    public function test_logged_in_users_can_edit_their_detail_in_dashboard()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '1111')
                    ->press('ورود')
                    ->assertPathIs('/dashboard')
                    ->assertSee('لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید')
                    ->assertSee('ویرایش')->click('@profile_link')->assertPathIs('/dashboard/user/update')
                    ->type('@name_input', 'تست شده')
                    ->type('@phone_input', '22222222222')
                    ->type('@address_input', 'ادرس تست شده')
                    ->press('@update_btn')
                    ->assertPathIs('/dashboard/user/update')
                    ->assertSee('جزییات کاربر ویرایش شد')
                    ->click('@Logout')->assertPathIs('/');
        });
    }
    //check system is sending reset password link to users email
    public function test_reset_password_link_is_sent_to_user_email(){
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود به حساب کاربری')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '1111')
                    ->press('ورود')
                    ->assertPathIs('/dashboard')
                    ->assertSee('لطفا ایمیل خود را باز کرده و بر روی لینک تایید کلیک کنید')
                    ->assertSee('تغییر رمز عبور')->click('@changePassword_link')->assertPathIs('/forgetPassword')
                    ->type('@email_input', 'test@gmail.com')
                    ->press('@submit_btn')
                    ->assertSee('لینک تغییر رمز عبور به ایمیل شما ارسال شد')
                    ->click('@Logout')->assertPathIs('/');
        });
    }
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
        $this->assertEquals(true,DB::table('users')->where('name','=','تست شده')->delete());
    }


    
}
