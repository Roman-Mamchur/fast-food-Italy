<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Addresse;
use App\Models\TimeSlot;

class Order extends Model
{
    use HasFactory;

    public function userName()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Addresse::class,'address_id','id');
    }

    public function TimeSlt()
    {
        return $this->belongsTo(TimeSlot::class,'delevery_time_id','id');
    }
    public function OrderItems(){
        return $this->belongsToMany(OrderItem::class, 'user_id', 'id');
    }

}
