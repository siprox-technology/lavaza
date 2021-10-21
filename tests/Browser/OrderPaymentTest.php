<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Order_item;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderPaymentTest extends DuskTestCase
{
    public function test_guest_user_can_order_and_pay()
    {
        $cart = new ShoppingCartTest();
        $cart->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/order')
            ->type('@name',' نایین جمشید ازکنی')
            ->type('@email','jamshid@gmail.com')
            ->type('@address','سپاهان ۲ پلان ۹۶')
            ->press('@guest_payment_btn')
            ->assertPathIs('/payment-result')
            ->assertSee('پرداخت با موفقیت انجام شد')
            ->assertSee('58.75');
        });
    }
    public function test_logged_in_user_can_order_and_pay()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود')
                    ->type('email', 'mshadow73@gmail.com')
                    ->type('password', '1111')
                    ->press('ورود')
                    ->assertPathIs('/dashboard');
        });
        $cart = new ShoppingCartTest();
        $cart->test_item_can_be_added_to_shopping_cart();
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/order')
            ->assertSee('پرداخت')
            ->press('پرداخت')
            ->assertPathIs('/payment-result')
            ->assertSee('پرداخت با موفقیت انجام شد')
            ->assertSee('58.75');
        });
    }
    //user login, see order history and order past orders and pay
    public function test_logged_in_user_can_see_order_history_and_order_past_orders()
    {
        $this->browse(function ($browser){
            $browser->visit('/')->visit('/login')
            ->assertSee('ورود')
                    ->type('email', 'mshadow73@gmail.com')
                    ->type('password', '1111')
                    ->press('ورود')
                    ->assertPathIs('/dashboard')
                    ->assertSee('سفارشات قبلی')
                    ->click('@order_history')
                    ->assertPathIs('/dashboard/orders-history')
                    ->assertSee('58.75')
                    ->press('@order_details')
                    ->pause('1000')
                    ->assertSee('سفارش مجدد')
                    ->press('@order_again')
                    ->assertPathIs('/order')
                    ->assertSee('33.75');
        });
        $this->assertEquals(true,DB::table('orders')->where('total_price','=','58.75')
        ->where('email','=','jamshid@gmail.com')->delete());
        $this->assertEquals(true,DB::table('orders')->where('total_price','=','58.75')
        ->where('email','=','mshadow73@gmail.com')->delete());
    }

}