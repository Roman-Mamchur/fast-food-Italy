<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;

class ApplyCoupon extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'copun_id','id');
    }
}
