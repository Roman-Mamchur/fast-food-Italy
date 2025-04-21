<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = [
        'status'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function translate_state()
    {
        return $this->belongsTo(TranslateState::class,'id','state_id')->where('lang_code','en');
    }

    public function translate_state_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateState::class,'id','state_id')->where('lang_code',$lang_code);
    }
    protected $appends = ['name'];
    protected $hidden = ['translate_state_lang'];

    public function getNameAttribute()
    {
       return $this->translate_state_lang->name; 
    }
}
