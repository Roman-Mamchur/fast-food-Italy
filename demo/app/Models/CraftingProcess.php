<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class CraftingProcess extends Model
{
    use HasFactory;

    public function translate_crafting()
    {
        return $this->belongsTo(TranslateCraftingProcess::class,'id','crafting_id')->where('lang_code','en');
    }

    public function crafting_translate_lang()
    {
      if(Session::get('front_lang')){
         $lang_code = Session::get('front_lang');
     }
     else{
         $lang_key = \App\Models\Setting::where('id', 1)->value('lang_key');
         $lang_code = $lang_key ?? 'en';
     }
     
        return $this->belongsTo(TranslateCraftingProcess::class,'id','crafting_id')->where('lang_code',$lang_code);
    }

    protected $appends = ['title','step_1','detils_1','step_2','detils_2','step_3','detils_3','step_4','detils_4',];
    protected $hidden = ['crafting_translate_lang'];


    public function getTitleAttribute()
    {
       return $this->crafting_translate_lang->title;
    }
    public function getStep1Attribute()
    {
       return $this->crafting_translate_lang->step_1;
    }
    public function getDetils1Attribute()
    {
       return $this->crafting_translate_lang->detils_1;
    }
    public function getStep2Attribute()
    {
       return $this->crafting_translate_lang->step_2;
    }
    public function getDetils2Attribute()
    {
       return $this->crafting_translate_lang->detils_2;
    }
    public function getStep3Attribute()
    {
       return $this->crafting_translate_lang->step_3;
    }
    public function getDetils3Attribute()
    {
       return $this->crafting_translate_lang->detils_3;
    }
    public function getStep4Attribute()
    {
       return $this->crafting_translate_lang->step_4;
    }
    public function getDetils4Attribute()
    {
       return $this->crafting_translate_lang->detils_4;
    }

}
