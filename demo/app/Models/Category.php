<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subcategory;
use Session;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'slug',
        'status',
        'image'
    ];
    public function Category()
    {
        return $this->hasMany(subcategory::class,'category_id','id');
    }
    public function translate_category()
    {
        return $this->belongsTo(TranslateCategory::class,'id','category_id')->where('lang_code','en');
    }

    public function translate_category_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }


        return $this->belongsTo(TranslateCategory::class,'id','category_id')->where('lang_code', $lang_code);
    }

    protected $appends = ['name'];
    protected $hidden = ['translate_category_lang'];



    public function getNameAttribute()
    {
       return $this->translate_category_lang->name;

    }

}
