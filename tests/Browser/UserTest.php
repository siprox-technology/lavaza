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
    //test register user with correct inputs 
    public function test_new_user_can_be_registered_with_phone_and_added_to_db()
    {

        $this->browse(function ($browser) {
            $browser->visit('/')->visit('/register')
                ->assertPathIs('/register')
                ->assertSee('ایجاد حساب کاربری')
                ->type('name', 'تست')
                ->type('email', 'test@gmail.com')
                ->type('phone', '09937736723')
                ->type('password', '1111')
                ->type('password_confirmation', '1111')
                ->press('ثبت نام')
                ->assertPathIs('/dashboard')
                ->assertSee('لطفا کد تایید پیامک شده را وارد نمایید')
                ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(1, User::where('name', '=', 'تست')->get()->count());
        $user_id = (DB::table('users')->where('name', 'تست')->pluck('id'))[0];
        $this->assertEquals(true, User::where('id', $user_id)
            ->update(['email_verified_at' => '2021-11-11 12:09:56']));
    }
    public function test_logged_in_users_can_edit_their_detail_in_dashboard()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')->visit('/login')
                ->assertSee('ورود به حساب کاربری')
                ->type('phone', '09937736723')
                ->type('password', '1111')
                ->press('ورود')
                ->assertPathIs('/dashboard')
                ->assertSee('در حال حاضر ادرسی ذخیره نشده است')
                ->assertSee('ویرایش')->click('@profile_link')->assertPathIs('/dashboard/user/update')
                ->type('@name_input', 'تست شده')
                ->type('@phone_input', '09937736723')
                ->type('@address_input', 'ادرس تست شده')
                ->press('@update_btn')
                ->assertPathIs('/dashboard/user/update')
                ->assertSee('جزییات کاربر ویرایش شد')
                ->click('@Logout')->assertPathIs('/');
        });
    }
    //check system is sending reset password link to users email
    public function test_reset_password_link_is_sent_to_user_email()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')->visit('/login')
                ->assertSee('ورود به حساب کاربری')
                ->type('phone', '09937736723')
                ->type('password', '1111')
                ->press('ورود')
                ->assertPathIs('/dashboard')
                ->assertSee('test@gmail.com')
                ->assertSee('تغییر رمز عبور')->click('@changePassword_link')->assertPathIs('/forgetPassword')
                ->type('@email_input', 'test@gmail.com')
                ->type('phone', '09937736723')->select('@send_method_select', '1')
                ->press('@submit_btn')
                ->assertSee('لینک تغییر رمز عبور به ایمیل شما ارسال شد')
                ->click('@Logout')->assertPathIs('/');
        });
    }
    //check system is sending reset password link to users phone-
    public function test_reset_password_link_is_sent_to_user_phone()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')->visit('/login')
                ->assertSee('ورود به حساب کاربری')
                ->type('phone', '09937736723')
                ->type('password', '1111')
                ->press('ورود')
                ->assertPathIs('/dashboard')
                ->assertSee('test@gmail.com')
                ->assertSee('تغییر رمز عبور')->click('@changePassword_link')->assertPathIs('/forgetPassword')
                ->type('@email_input', 'test@gmail.com')
                ->type('phone', '09937736723')->select('@send_method_select', '0')
                ->press('@submit_btn')
                ->assertSee('لینک تغییر رمز عبور تا چند دقیقه دیگر به شماره موبایل شما پیامک خواهد شد')
                ->click('@Logout')->assertPathIs('/');
        });
    }
    //test login with correct credentials
    public function test_login_and_logout_with_correct_credentials()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')->visit('/login')
                ->assertSee('ورود به حساب کاربری')
                ->type('phone', '09937736723')
                ->type('password', '1111')
                ->press('ورود')
                ->assertPathIs('/dashboard')
                ->assertSee('test@gmail.com')
                ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(true, DB::table('users')->where('name', '=', 'تست شده')->delete());
    }
}
