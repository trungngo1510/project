<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $totalPrice;

    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct($cart,$totalPrice)
    {
        $this->cart = $cart;
        $this->totalPrice= $totalPrice;
    }

    /**
     * build the message 
     * 
     * @return $this
     */

    public function build(){
        return $this ->from('nguyenducthangdn73@gmail.com','Chi tiết đơn hàng ')
        ->subject('Chi tiết giỏ hàng')->view("frontend.emails.indexEmail");
    }
}
