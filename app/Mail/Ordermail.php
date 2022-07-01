<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class Ordermail extends Mailable
{
    use Queueable, SerializesModels;

 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('quicksecureindia.com', 'user')->subject('Order Confirmation Mail from quicksecureindia.com')->view('mails.order-mail');
    } 
}
