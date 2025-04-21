<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\TranslateAboutUs;
use App\Models\Language;
use Validator;
use Image;
use File;
use Str;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us =  AboutUs::with('aboutus_translate')->first();
        return view('Admin.pages.pages.about_us',compact('about_us'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'main_title' => 'required|string',
            'about_us' => 'required|string',
        ]);

        $about = AboutUs::find($id);
        $old_image = $about->banner_image;
        if($request->banner_image){
            $extention = $request->banner_image->getClientOriginalExtension();
            $image_name = Str::slug('banner_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/website-images/'.$image_name;
            Image::make($request->banner_image)
                ->save(public_path().'/'.$image_name);

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }else{
            $image_name =  $old_image;
        }
        $about->banner_image = $image_name;
        $about -> save();

        $about_us = TranslateAboutUs::find($id);
        $about_us->aboutus_id = $about_us->aboutus_id;
        $about_us->title = $request->title;
        $about_us->main_title = $request->main_title;
        $about_us->description = $request->about_us;
        $about_us->customer = $request->customer;
        $about_us->text_1 = $request->text_1;
        $about_us->branch = $request->branch;
        $about_us->text_2 = $request->text_2;
        $about_us->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $aboutus = AboutUs::with('aboutus_translate')->first();
        $translate_aboutus =  TranslateAboutUs::where('aboutus_id',$aboutus->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.pages.about_us',compact('translate_aboutus','aboutus','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'main_title' => 'required|string',
            'about_us' => 'required|string',
           ]);
        $translate = TranslateAboutUs::find($id);
        $translate->aboutus_id = $translate->aboutus_id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->main_title = $request->main_title;
        $translate->description = $request->about_us;
        $translate->customer = $request->customer;
        $translate->text_1 = $request->text_1;
        $translate->branch = $request->branch;
        $translate->text_2 = $request->text_2;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
