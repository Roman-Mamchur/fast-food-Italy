<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class OptionalItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'status',
        'total'
    ];

    public function translate_item()
    {
        return $this->belongsTo(TranslateOptionalItem::class,'id','item_id')->where('lang_code','en');
    }

    public function item_translate_lang()
    {
        if(Session::get('front_lang')){
            $lang_code = Session::get('front_lang');
        }
        else{
            $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
            $lang_code = $lang_key ?? 'en';
        }
        return $this->belongsTo(TranslateOptionalItem::class,'id','item_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['name'];
    protected $hidden = ['item_translate_lang'];


    public function getNameAttribute()
    {
       return $this->item_translate_lang->name;
    }

}
