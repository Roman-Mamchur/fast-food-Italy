<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class MobileApp extends Model
{
    use HasFactory;

    public function app_translate()
    {
        return $this->belongsTo(TranslateMobileApp::class,'id','app_id')->where('lang_code','en');
    }

    public function app_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateMobileApp::class,'id','app_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['titel','description'];
    protected $hidden = ['faq_translate_lang'];


    public function getTitelAttribute()
    {
       return $this->app_translate_lang->titel;
    }

    public function getDescriptionAttribute()
    {
       return $this->app_translate_lang->description;
    }
}
