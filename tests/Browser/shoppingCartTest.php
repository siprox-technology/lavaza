<?php

namespace Tests\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShoppingCartTest extends DuskTestCase
{
     // add to cart
    public function test_item_can_be_added_to_shopping_cart()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('منوی لذیذ')->press('@Starter_filter_btn')
                    ->assertSee('سمپلر')->type('@quantity-input-1', '3')->press('@submit-btn-1')
                    ->press('@cartOpen')->pause('1000')->assertSee('جمع سفارش')
                    ->click('@order_process_link')->assertPathIs('/order')
                    ->assertSee('سمپلر')->assertSee('99,750');
        });
    }
    
    // delete item from cart
    public function test_item_can_be_deleted_from_shopping_cart()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/order')->assertSee('سمپلر')->assertSee('99,750')
            ->click('@product-remove-link')->assertPathIs('/order')
                    ->assertSee('سبد شما خالی است');
        });
    }
   //the whole shopping cart can be deleted
    public function test_the_whole_cart_can_be_deleted(){
        $this->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->visit('/order')->assertSee('سمپلر')->assertSee('99,750')
            ->click('@order_delete_whole_cart_link')->assertPathIs('/');
        });
        $this->assertEquals(null,Session::get('cart'));
    }
    // notes can be added and removed from shopping cart
    public function test_notes_can_be_added_to_and_removed_from_cart()
    {
        $this->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->visit('/order')->type('@add-notes-input', 'لطفا فلفل اضافه نکنید')
            ->press('@add-notes-btn')->assertPathIs('/order')->assertSee('لطفا فلفل اضافه نکنید')
            ->press('@remove-notes-btn')->assertPathIs('/order');
            $value = $browser->value('@add-notes-input');
            $this->assertEquals(null,$value);
        });
    }
}
