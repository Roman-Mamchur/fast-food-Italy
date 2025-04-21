<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footers';
    protected $fillable = [
        'image'
    ];


    public function translate_footer()
    {
        return $this->belongsTo(TranslateFooter::class,'id','footer_id')->where('lang_code','en');
    }

    public function footer_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }

        return $this->belongsTo(TranslateFooter::class,'id','footer_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['about_us','first_column','second_column','copyright'];
    protected $hidden = ['footer_translate_lang'];


    public function getAboutUsAttribute()
    {
       return $this->footer_translate_lang->about_us;
    }

    public function getFirstColumnAttribute()
    {
       return $this->footer_translate_lang->first_column;
    }

    public function getSecondColumnAttribute()
    {
       return $this->footer_translate_lang->second_column;
    }

    public function getCopyrightAttribute()
    {
       return $this->footer_translate_lang->copyright;
    }
}
