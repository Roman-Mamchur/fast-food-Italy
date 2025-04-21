<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\MobileApp;
use App\Models\TranslateMobileApp;
use Validator;
use Image;
use File;
use Str;

class MobileAppController extends Controller
{
    public function index()
    {
        $app =  MobileApp::with('app_translate')->first();
        return view('Admin.pages.mobile_app.index',compact('app'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'titel' => 'required|string',
            'description' => 'required|string',
        ]);

        $app = MobileApp::find($id);
        $old_image = $app->image;
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

        $app->image = $image_name;
        $app->play_store = $request->play_store;
        $app->i_store = $request->i_store;
        $app->save();

        $translate = TranslateMobileApp::where('app_id',$id)->where('lang_code','en')->first();
        $translate->titel = $request->titel;
        $translate->description = $request->description;
        $translate->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $app = MobileApp::with('app_translate')->first();
        $translate_app =  TranslateMobileApp::where('app_id',$app->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.mobile_app.index',compact('translate_app','app','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'titel' => 'required|string',
            'description' => 'required|string',
           ]);
        $translate = TranslateMobileApp::find($id);
        $translate->app_id = $translate->app_id;
        $translate->lang_code = $translate->lang_code;
        $translate->titel = $request->titel;
        $translate->description = $request->description;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
