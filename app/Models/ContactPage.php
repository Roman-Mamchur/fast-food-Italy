<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class ContactPage extends Model
{
    use HasFactory;
    protected $table = 'contact_pages';
    protected $fillable = [
        'email',
        'email2',
        'phone',
        'phone2',
        'google_map'
    ];
    public function translate_contactus()
    {
        return $this->belongsTo(TranslateContactpage::class,'id','contact_id')->where('lang_code','en');
    }
    public function translate_contactus_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateContactpage::class,'id','contact_id')->where('lang_code',$lang_code);
    }
    protected $appends = ['heading','title','heading2','address'];
    protected $hidden = ['translate_contactus_lang'];

    public function getHeadingAttribute()
    {
       return $this->translate_contactus_lang->heading;
    }

    public function getTitleAttribute()
    {
       return $this->translate_contactus_lang->title;
    }

    public function getHeading2Attribute()
    {
       return $this->translate_contactus_lang->heading2;
    }

    public function getAddressAttribute()
    {
       return $this->translate_contactus_lang->address;
    }
}
