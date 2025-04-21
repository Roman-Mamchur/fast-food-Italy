<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'size', 'addons', 'qty'];
    protected $casts = ['size' => 'json', 'addons' => 'json'];
}
