<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{
    //admin login with correct credentials -1
    public function test_admin_can_login_with_correct_credentials(){
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('Login')
                    ->type('email', 'mshadow73@gmail.com')
                    ->type('password', '1111')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->assertSee('Admin Panel')
                    ->assertSee('Database')
                    ->click('@Logout')->assertPathIs('/');
        });
    }
    //admin can update a user -2
    public function test_admin_update_user_details()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('Login')
                    ->type('email', 'mshadow73@gmail.com')->type('password', '1111')
                    ->press('Login')->assertPathIs('/admin')
                    ->assertSee('Admin Panel')->assertSee('Database')
                    ->clickLink('Database')->clickLink('Users')
                    ->pause('1000')->assertSee('test@gmail.com')
                    ->press('@updateUserLink ')->assertSee('Update user details')->assertSee('Name:')
                    ->value('#name', 'test')->type('name', 'test1')
                    ->type('phone', '11111111111')->type('address','test address number test')
                    ->type('city', 'test city')->type('state', 'test state')
                    ->type('country', 'test country')->type('post_code', 'test1code1')
                    ->press('Update')->assertSee('جزییات کاربر ویرایش شد')
                    ->click('@Logout')->assertPathIs('/');    
        });
        $this->assertEquals(1, User::where('name','=','test1')
        ->where('phone','11111111111')->where('address','test address number test')
        ->get()->count()); 
    }
    //admin can delete a user -3
    public function test_admin_can_delete_a_user()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('Login')
                    ->type('email', 'mshadow73@gmail.com')
                    ->type('password', '1111')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->assertSee('Admin Panel')
                    ->assertSee('Database')
                    ->clickLink('Database')
                    ->clickLink('Users')
                    ->pause('1000')
                    ->assertSee('test@gmail.com')
                    ->press('@deleteUserBtn ')
                    ->assertPathIs('/admin')
                    ->click('@Logout')->assertPathIs('/');
        });
        $this->assertEquals(0, User::where('name','=','test1')->get()->count());
    }
    
    //admin can update user details

}

