<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    //test register user with correct inputs
    public function test_new_user_can_be_registered_and_added_to_db()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/register')
            ->assertPathIs('/register')
            ->assertSee('CREATE YOUR ACCOUNT')
                    ->type('name', 'test')
                    ->type('email', 'test@gmail.com')
                    ->type('phone', '11111111111')
                    ->type('password', '1111')
                    ->type('password_confirmation', '1111')
                    ->press('@RegisterSubmitBtn')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Please verify email address')
                    ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(1, User::where('name','=','test')->get()->count());
        //$this->assertEquals(true,DB::table('users')->where('name','=','test')->delete());
    }
    //test register with incorrect inputs and receive error messages

    //test login with correct credentials
/*     public function test_login_and_logout_with_correct_credentials()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('Login')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '1111')
                    ->press('Login')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Email verified')
                    ->click('@Logout')->assertPathIs('/');
        });
    } */

    //test login with incorrect credentials and receive error messages
}
