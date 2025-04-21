<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $table = 'login_activity';

    protected $fillable = [
        'admin_id',
        'browser_name',
        'ip'
    ];
}
