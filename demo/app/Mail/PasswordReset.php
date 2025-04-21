<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
    public $timestamps = false;
    public $primaryKey = 'email';
    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];
    protected $casts = [
        'email' => 'string', // Ensure email is cast as a string
    ];
}
