<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $mail_subject;
    public $user;
    public function __construct($template,$mail_subject,$user)
    {
        $this->template=$template;
        $this->mail_subject=$mail_subject;
        $this->user=$user;
    }

    public function build()
    {   $template = $this->template;
        return $this->subject($this->mail_subject)->view('Frontend.Auth.user_reset_mail', compact('template'));
    }
}
