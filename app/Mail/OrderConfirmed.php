<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $payment_data = [];
    private $order_id;

    public function __construct($payment_data,$order_id)
    {
        $this->payment_data = $payment_data;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('تایید سفارش از لاوازا')
        ->markdown('vendor.notifications.order-confirmed', [
            'greeting' =>' به رستوران لاوازا خوش امدید',
            'introLines' =>'سفارش شما با موفقیت ثبت شد',
            'outroLines'=>$this->payment_data,
            'order_id'=>$this->order_id,
            'salutation'=>'با تشکر از خرید شما'
        ]);
    }
}
