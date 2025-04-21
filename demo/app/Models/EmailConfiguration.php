<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfiguration extends Model
{
    use HasFactory;

    protected $table = "email_configurations";

    protected $fillable = [
        'mailer' ,
        'mail_host',
        'mail_port',
        'smtp_username',
        'smtp_password',
        'mail_encryption',
        'email'
    ];
}
