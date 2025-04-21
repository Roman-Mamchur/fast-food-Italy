<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\TranslateSlider;
use App\Models\Language;
use Str;
use Image;
use File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('translate_slider')->paginate(8);
        return view('Admin.Sliders',compact('sliders'));
    }
    public function create()
    {
        $categories = Category::with('translate_category')->where('status','active')->get();
        return view('Admin.CreateSlider',compact('categories'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',
        ]);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        }else{
            $image_name = null;
        }
        $slider = new Slider();
        $slider->category_id = $request->category_id;
        $slider->image = $image_name;
        $slider->link = $request->link;
        $slider->url = $request->url;
        $slider->status = 'active';
        $slider->save();


        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
        $translate = new TranslateSlider();
        $translate->slider_id = $slider->id;
        $translate->lang_code = $language->lang_code;
        $translate->title = $request->title;
        $translate->save();
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('slider.edit',$slider->id)->with($notification);

    }
    public function edit($id)
    {
        $categories = Category::with('translate_category')->where('status','active')->get();
        $slider = Slider::with('translate_slider')->find($id);
        return view('Admin.EditSlider',compact('categories', 'slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
        ]);

        $slider = Slider::find($id);
        $old_image = $slider->image;
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
        }else{
            $image_name = $old_image;
        }
        $slider->image = $image_name;
        $slider->link = $request->link;
        $slider->url = $request->url;
        $slider->status = 'active';
        $slider->save();


        $translate = TranslateSlider::where('slider_id',$slider->id)->where('lang_code','en')->first();
        $translate->slider_id = $slider->id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->save();

        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('slider.edit',$slider->id)->with($notification);


    }
    public function delete($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;
        $slider->delete();
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }
        TranslateSlider::where('slider_id',$id)->delete();
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('slider.index')->with($notification);
    }

    public function editLanguage($sliderId,$langCode)
    {
        $slider =  Slider::with('translate_slider')->find($sliderId);
        $translate_slider =  TranslateSlider::where('slider_id',$sliderId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditSlider',compact('translate_slider','slider','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string'
           ]);
        $translate = TranslateSlider::find($id);
        $translate->slider_id = $translate->slider_id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
