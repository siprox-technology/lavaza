<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Order_item;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderPaymentTest extends DuskTestCase
{
    public function test_guest_user_can_order_and_pay()
    {
        $cart = new shoppingCartTest();
        $cart->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->click('@submit-order-btn')
            ->assertPathIs('/order')
            ->type('@name',' نایین جمشید ازکنی')
            ->type('@email','jamshid@gmail.com')
            ->type('@address','سپاهان ۲ پلان ۹۶')
            ->press('@payment_btn')
            ->assertPathIs('/payment-result')
            ->assertSee('پرداخت با موفقیت انجام شد')
            ->assertSee('58.75');
        });
    }
}
