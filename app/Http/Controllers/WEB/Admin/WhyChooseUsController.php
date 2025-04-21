<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\why_choose_us;
use App\Models\TranslateWhychooseus;
use App\Models\Language;

class WhyChooseUsController extends Controller
{
    public function edit()
    {
        $why_choose_us = why_choose_us::with('whychooseus_translate')->first();
        return view('Admin.EditWhyChoseUs',compact('why_choose_us'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'why_description' => 'required|string',
           ]);

        $why_choose_us = why_choose_us::first();
        $old_image = $why_choose_us->image;
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/sliders/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        }else{
            $image_name = $old_image;
        }
        $why_choose_us->image = $image_name;
        $why_choose_us->save();


        $translate = TranslateWhychooseus::where('why_choose_us_id',$why_choose_us->id)->where('lang_code','en')->first();
        $translate->why_choose_us_id = $translate->why_choose_us_id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->description = $request->why_description;
        $translate->save();


        $message = "Updated Susseccfully!";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editLanguage($langCode)
    {
        $whychooseus = why_choose_us::with('whychooseus_translate')->first();
        $translate_whychooseus =  TranslateWhychooseus::where('why_choose_us_id',$whychooseus->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditWhyChoseUs',compact('translate_whychooseus','whychooseus','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'why_description' => 'required|string',
           ]);
        $translate = TranslateWhychooseus::find($id);
        $translate->why_choose_us_id = $translate->why_choose_us_id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->description = $request->why_description;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
