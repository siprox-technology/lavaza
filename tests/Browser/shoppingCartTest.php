<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class shoppingCartTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_item_can_be_added_to_shopping_cart()
    {
/*         $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
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
                    ->press('Update')->assertSee('User updated successfully')
                    ->click('@Logout')->assertPathIs('/');    
        }); */
    }
}
