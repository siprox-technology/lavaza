<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Morilog\Jalali\Jalalian;

class OrderCanceled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('کنسل سفارش از لاوازا')
        ->markdown('vendor.notifications.order-canceled', [
            'introLines' =>'سفارش شما کنسل شد',
            'outroLines'=>$this->order,
            "date_time" =>  Jalalian::fromDateTime($this->order->created_at->toDateTimeString())->toString(),
            'salutation'=>'مبلغ سفارش به حساب شما باز می گردد'
        ]);
    }
}
