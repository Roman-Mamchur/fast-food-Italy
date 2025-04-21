<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class FaqImages extends Model
{
    use HasFactory;

    public function faq_about_translate()
    {
        return $this->belongsTo(TranslationFaqImages::class,'id','faq_img_id')->where('lang_code','en');
    }

    public function faq_about_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslationFaqImages::class,'id','faq_img_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['titel','first_description','secend_description'];
    protected $hidden = ['faq_about_translate_lang'];


    public function getTitelAttribute()
    {
       return $this->faq_about_translate_lang->titel;
    }

    public function getFirstDescriptionAttribute()
    {
       return $this->faq_about_translate_lang->first_description;
    }

    public function getSecendDescriptionAttribute()
    {
       return $this->faq_about_translate_lang->secend_description;
    }
}
