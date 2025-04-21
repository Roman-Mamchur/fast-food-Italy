<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\TranslateFooter;
use App\Models\Language;
use Validator;
use Hash;
use Image;
use Str;
use File;

class FooterController extends Controller
{
    public function index()
    {
        $footer =  Footer::with('translate_footer')->first();
        return view('Admin.Footer',compact('footer'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'about_us' => 'required|string',
            'first_column' => 'required|string',
            'second_column' => 'required|string',
            'copyright' => 'required|string',
        ]);

        $footer = Footer::find($id);
        $old_image = $footer->image;
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug('image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/website-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }else{
            $image_name =  $old_image;
        }

        $footer->image = $image_name;
        $footer->save();

        $translate_footer = TranslateFooter::where('footer_id',$id)->where('lang_code','en')->first();
        $translate_footer->about_us = $request->about_us;
        $translate_footer->first_column = $request->first_column;
        $translate_footer->second_column = $request->second_column;
        $translate_footer->copyright = $request->copyright;
        $translate_footer->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $footer = Footer::with('translate_footer')->first();
        $translate_footer =  TranslateFooter::where('footer_id',$footer->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.Footer',compact('translate_footer','footer','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'about_us' => 'required|string',
            'first_column' => 'required|string',
            'second_column' => 'required|string',
            'copyright' => 'required|string',
           ]);
        $translate = TranslateFooter::find($id);
        $translate->footer_id = $translate->footer_id;
        $translate->lang_code = $translate->lang_code;
        $translate->about_us = $request->about_us;
        $translate->first_column = $request->first_column;
        $translate->second_column = $request->second_column;
        $translate->copyright = $request->copyright;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

}
