<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgetPasswordForOTP extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        // dd($this->data);
        return $this->subject($this->data['title'])
        ->view('Frontend.Auth.user_reset_mail_for_otp') // Point to the Blade template
        ->with('data', $this->data); 
    }
}
