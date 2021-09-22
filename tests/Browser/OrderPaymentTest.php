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

    public function test_user_can_see_order_history_after_payment()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('Login')
                    ->type('email', 'mshadow73@gmail.com')
                    ->type('password', '1111')
                    ->press('Login')
                    ->assertPathIs('/dashboard');
        });
        $cart = new shoppingCartTest();
        $cart->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->click('@submit-order-btn')
            ->assertPathIs('/order')
            ->assertSee('پرداخت')
            ->press('پرداخت')
            ->assertPathIs('/payment-result')
            ->assertSee('پرداخت با موفقیت انجام شد')
            ->assertSee('58.75')
            ->assertSee('سابقه سفارشات')
            ->click('@order_history')
            ->assertPathIs('/dashboard/orders-history')
            ->assertSee('58.75');
        });
    }

    public function test_user_can_order_past_orders()
    {
        $this->test_user_can_see_order_history_after_payment();
        $this->browse(function (Browser $browser) {
            $browser->press('@order_details')
            ->pause('1000')
            ->assertSee('سفارش مجدد')
            ->press('@order_again')
            ->assertPathIs('/cart')
            ->assertSee('33.75');
        });
    }
}
