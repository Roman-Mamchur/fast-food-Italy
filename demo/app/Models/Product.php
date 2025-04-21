<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    public function cat_name()
    {
        return $this->hasMany(Category::class,'id','category_id');
    }

    public function translate_product()
    {
        return $this->belongsTo(TranslateProduct::class,'id','product_id')->where('lang_code','en');
    }

    public function product_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateProduct::class,'id','product_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['name','long_description','vedio_top_ber_description','vedio_buttom_description','size','specifaction'];
    protected $hidden = ['product_translate_lang'];


    public function getNameAttribute()
    {
       return $this->product_translate_lang->name;
    }
    public function getLongDescriptionAttribute()
    {
       return $this->product_translate_lang->long_description;
    }
    public function getVedioTopBerDescriptionAttribute()
    {
       return $this->product_translate_lang->vedio_top_ber_description;
    }
    public function getVedioButtomDescriptionAttribute()
    {
       return $this->product_translate_lang->vedio_buttom_description;
    }
    public function getSizeAttribute()
    {
       return $this->product_translate_lang->size;
    }
    public function getSpecifactionAttribute()
    {
       return $this->product_translate_lang->specifaction;
    }


}
