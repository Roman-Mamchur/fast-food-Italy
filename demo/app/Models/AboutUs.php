<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Models\Setting;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = 'about_us';
    protected $fillable = [
        'description',
        'banner_image',
        'status',
        'quotation'
    ];

    public function aboutus_translate()
    {
        return $this->belongsTo(TranslateAboutUs::class,'id','aboutus_id')->where('lang_code','en');
    }
    public function aboutus_translate_lang()
    {
      if(Session::get('front_lang')){
         $lang_code = Session::get('front_lang');
     }
     else{
         $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
         $lang_code = $lang_key ?? 'en';
     }

        return $this->belongsTo(TranslateAboutUs::class,'id','aboutus_id')->where('lang_code',$lang_code);
    }
    protected $appends = ['title','main_title','description','customer','text_1','branch','text_2'];
    protected $hidden = ['aboutus_translate_lang'];

    public function getTitleAttribute()
    {
       return $this->aboutus_translate_lang->title;
    }
    public function getMainTitleAttribute()
    {
       return $this->aboutus_translate_lang->main_title;
    }
    public function getDescriptionAttribute()
    {
       return $this->aboutus_translate_lang->description;
    }
    public function getCustomerAttribute()
    {
       return $this->aboutus_translate_lang->customer;
    }
    public function getText1Attribute()
    {
       return $this->aboutus_translate_lang->text_1;
    }
    public function getBranchAttribute()
    {
       return $this->aboutus_translate_lang->branch;
    }
    public function getText2Attribute()
    {
       return $this->aboutus_translate_lang->text_2;
    }
}
