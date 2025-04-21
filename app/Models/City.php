<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use Session;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable =  [
        'state_id',
        'name',
        'slug',
        'status'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function translate_city()
    {
        return $this->belongsTo(TranslateCity::class,'id','city_id')->where('lang_code','en');
    }

    public function translate_city_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }

        return $this->belongsTo(TranslateCity::class,'id','city_id')->where('lang_code',$lang_code);
    }
    protected $appends = ['name'];
    protected $hidden = ['translate_city_lang'];

    public function getNameAttribute()
    {
       return $this->translate_city_lang->name;
    }
}
