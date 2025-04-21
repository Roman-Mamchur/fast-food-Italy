<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;


    protected $gaurd = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status',
        'admin_type',
        'about',
        'phone',
        'bio',
        'DOB',
        'address',
        'email_verified'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
