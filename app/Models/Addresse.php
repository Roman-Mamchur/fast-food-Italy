<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Country;
use  App\Models\State;
use  App\Models\City;

class Addresse extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    public function GetCountry()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function GetState()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    public function GetCity()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function DeliveryArea()
    {
        return $this->belongsTo(DeleveryArea::class,'area_id','id');
    }


}
