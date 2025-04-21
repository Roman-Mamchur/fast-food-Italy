<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Slider extends Model
{
    use HasFactory;

    public function translate_slider()
    {
        return $this->belongsTo(TranslateSlider::class,'id','slider_id')->where('lang_code','en');
    }
    public function translate_slider_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }

        return $this->belongsTo(TranslateSlider::class,'id','slider_id')->where('lang_code',$lang_code);;
    }


    protected $appends = ['title'];
    protected $hidden = ['translate_slider_lang'];

    public function getTitleAttribute()
    {
       return $this->translate_slider_lang->title;

    }
    public function getDescriptionAttribute()
    {
       return $this->translate_slider_lang->title;

    }
}
