<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = [
        'status'
    ];

    public function translate_faq()
    {
        return $this->belongsTo(TranslateFaq::class,'id','faq_id')->where('lang_code','en');
    }

    public function faq_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateFaq::class,'id','faq_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['question','answer'];
    protected $hidden = ['faq_translate_lang'];


    public function getQuestionAttribute()
    {
       return $this->faq_translate_lang->question;
    }

    public function getAnswerAttribute()
    {
       return $this->faq_translate_lang->answer;
    }
}
