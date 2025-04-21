<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqImages;
use App\Models\TranslationFaqImages;
use App\Models\Language;
use Validator;
use Image;
use File;
use Str;

class FAQAboutController extends Controller
{
    public function index()
    {
        $faq_about =  FaqImages::with('faq_about_translate')->first();
        return view('Admin.pages.faq.about',compact('faq_about'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'first_description' => 'required|string',
            'secend_description' => 'required|string',
        ]);

        $about_faq = FaqImages::find($id);
        $old_image1 = $about_faq->image1;
        $old_image2 = $about_faq->image2;
        $old_image3 = $about_faq->image3;
        $old_image4 = $about_faq->image4;

        if($request->image1){
            $extention = $request->image1->getClientOriginalExtension();
            $image_name1 = Str::slug('image1').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name1 = 'uploads/website-images/'.$image_name1;
            Image::make($request->image1)
                ->save(public_path().'/'.$image_name1);

            if($old_image1){
                if(File::exists(public_path().'/'.$old_image1))unlink(public_path().'/'.$old_image1);
            }
        }else{
            $image_name1 =  $old_image1;
        }
        if($request->image2){
            $extention = $request->image2->getClientOriginalExtension();
            $image_name2 = Str::slug('image2').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name2 = 'uploads/website-images/'.$image_name2;
            Image::make($request->image2)
                ->save(public_path().'/'.$image_name2);

            if($old_image2){
                if(File::exists(public_path().'/'.$old_image2))unlink(public_path().'/'.$old_image2);
            }
        }else{
            $image_name2 =  $old_image2;
        }

        if($request->image3){
            $extention = $request->image3->getClientOriginalExtension();
            $image_name3 = Str::slug('image3').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name3 = 'uploads/website-images/'.$image_name3;
            Image::make($request->image3)
                ->save(public_path().'/'.$image_name3);

            if($old_image3){
                if(File::exists(public_path().'/'.$old_image3))unlink(public_path().'/'.$old_image3);
            }
        }else{
            $image_name3 =  $old_image3;
        }

        if($request->image4){
            $extention = $request->image4->getClientOriginalExtension();
            $image_name4 = Str::slug('image4').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name4 = 'uploads/website-images/'.$image_name4;
            Image::make($request->image4)
                ->save(public_path().'/'.$image_name4);

            if($old_image4){
                if(File::exists(public_path().'/'.$old_image4))unlink(public_path().'/'.$old_image4);
            }
        }else{
            $image_name4 =  $old_image4;
        }


        $about_faq->image1 = $image_name1;
        $about_faq->image2 = $image_name2;
        $about_faq->image3 = $image_name3;
        $about_faq->image4 = $image_name4;
        $about_faq->save();

        $translate_faq = TranslationFaqImages::where('faq_img_id',$id)->where('lang_code','en')->first();
        $translate_faq->titel = $request->title;
        $translate_faq->first_description = $request->first_description;
        $translate_faq->secend_description = $request->secend_description;
        $translate_faq->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $aboutfaq = FaqImages::with('faq_about_translate')->first();
        $translate_aboutfaq =  TranslationFaqImages::where('faq_img_id',$aboutfaq->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.faq.about',compact('translate_aboutfaq','aboutfaq','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
  
            'first_description' => 'required|string',
            'secend_description' => 'required|string',
           ]);
        $translate = TranslationFaqImages::find($id);
        $translate->faq_img_id = $translate->faq_img_id;
        $translate->lang_code = $translate->lang_code;
        $translate->titel = $request->titel;
        $translate->first_description = $request->first_description;
        $translate->secend_description = $request->secend_description;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
