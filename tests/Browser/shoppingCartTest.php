<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class shoppingCartTest extends DuskTestCase
{
     // test : item id 1 with the name of 'سمپلر' with price of 11.50 and quantity of 3 is added to cart
    public function test_item_can_be_added_to_shopping_cart()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('منوی لذیذ')->assertSee('سمپلر')
                    ->type('@quantity-input-1', '3')->press('@submit-btn-1')
                    ->press('@cartOpen')->pause('1000')->assertSee('جمع سفارش')
                    ->click('@view-shopping-cart')->assertPathIs('/cart')
                    ->assertSee('سمپلر')->assertSee('33.75');
        });
    }
    
    //test: item id 1 with the name of 'سمپلر' with price of 11.50 and quantity of 3 is deleted from the cart
    public function test_item_can_be_deleted_from_shopping_cart()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')->assertSee('سمپلر')->assertSee('33.75')
            ->click('@product-remove-link')->assertPathIs('/cart')
                    ->assertSee('سبد شما خالی است');
        });

    }
    //test: the whole shopping cart can be deleted
    public function test_the_whole_cart_can_be_deleted(){
        $this->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')->assertSee('سمپلر')->assertSee('33.75')
            ->click('@delete_whole_cart_link')->assertPathIs('/cart')
                    ->assertSee('سبد شما خالی است');
        });
    }
    //test: notes can be added and removed from shopping cart
    public function test_notes_can_be_added_to_and_removed_from_cart()
    {
        $this->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->visit('/cart')->type('@add-notes-input', 'لطفا فلفل اضافه نکنید')
            ->press('@add-notes-btn')->assertPathIs('/cart')->assertSee('لطفا فلفل اضافه نکنید')
            ->press('@remove-notes-btn')->assertPathIs('/cart');
            $value = $browser->value('@add-notes-input');
            $this->assertEquals(null,$value);
        });
    }
}
