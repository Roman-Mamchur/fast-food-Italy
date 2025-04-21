<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDecline extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $OrderItem;
    public $CustomerName;
    public $subject;
    public function __construct($order,$OrderItem,$subject, $CustomerName)
    {
        $this->order=$order;
        $this->OrderItem=$OrderItem;
        $this->CustomerName=$CustomerName;
        $this->subject=$subject;
    }
    
    public function build()
    {
        $order = $this->order;
        $OrderItem = $this->OrderItem;
        $CustomerName = $this->CustomerName;
        $subject = $this->subject;
        return $this->subject($this->subject)->view('Frontend.User.order_decline_template', compact('order', 'OrderItem', 'CustomerName'));
    }
}
