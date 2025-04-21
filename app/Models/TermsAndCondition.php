<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class TermsAndCondition extends Model
{
    use HasFactory;
    protected $table = 'terms_and_conditions';
    
    public function termsandcondition_translate()
    {
        return $this->belongsTo(TranslateTermsandCondition::class,'id','tandc_id')->where('lang_code','en');
    }
    public function termsandcondition_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return  $this->belongsTo(TranslateTermsandCondition::class,'id','tandc_id')->where('lang_code',$lang_code);
    }
    protected $appends = ['termsandcondition','privacy'];
    protected $hidden = ['termsandcondition_translate_lang'];

    public function getTermsandconditionAttribute()
    {
       return $this->termsandcondition_translate_lang->termsandcondition; 
    }
    public function getPrivacyAttribute()
    {
       return $this->termsandcondition_translate_lang->privacy; 
    }
}
