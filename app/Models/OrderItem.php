<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'size', 'note', 'addons', 'qty','total'];
    protected $casts = ['size' => 'json', 'addons' => 'json'];
}
