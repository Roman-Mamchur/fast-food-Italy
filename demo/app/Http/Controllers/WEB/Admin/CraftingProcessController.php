<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CraftingProcess;
use App\Models\TranslateCraftingProcess;
use App\Models\Language;
use Validator;
use Image;
use File;
use Str;

class CraftingProcessController extends Controller
{
    public function index()
    {
        $crafting =  CraftingProcess::with('translate_crafting')->first();
        return view('Admin.pages.pages.crafting',compact('crafting'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'step_1' => 'required|string',
            'detils_1' => 'required|string',
            'step_2' => 'required|string',
            'detils_2' => 'required|string',
            'step_3' => 'required|string',
            'detils_3' => 'required|string',
            'step_4' => 'required|string',
            'detils_4' => 'required|string',
        ]);

        $crafting = CraftingProcess::find($id);
        $old_image = $crafting->image;
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

        $crafting->image = $image_name;
        $crafting->save();

        $translate = TranslateCraftingProcess::where('crafting_id',$id)->where('lang_code','en')->first();
        $translate->title = $request->title;
        $translate->step_1 = $request->step_1;
        $translate->detils_1 = $request->detils_1;
        $translate->step_2 = $request->step_2;
        $translate->detils_2 = $request->detils_2;
        $translate->step_3 = $request->step_3;
        $translate->detils_3 = $request->detils_3;
        $translate->step_4 = $request->step_4;
        $translate->detils_4 = $request->detils_4;
        $translate->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $crafting = CraftingProcess::with('translate_crafting')->first();
        $translate_crafting  =  TranslateCraftingProcess::where('crafting_id',$crafting->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.pages.crafting',compact('translate_crafting','crafting','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
                'title' => 'required|string',
                'step_1' => 'required|string',
                'detils_1' => 'required|string',
                'step_2' => 'required|string',
                'detils_2' => 'required|string',
                'step_3' => 'required|string',
                'detils_3' => 'required|string',
                'step_4' => 'required|string',
                'detils_4' => 'required|string',
           ]);
        $translate = TranslateCraftingProcess::find($id);
        $translate->title = $request->title;
        $translate->step_1 = $request->step_1;
        $translate->detils_1 = $request->detils_1;
        $translate->step_2 = $request->step_2;
        $translate->detils_2 = $request->detils_2;
        $translate->step_3 = $request->step_3;
        $translate->detils_3 = $request->detils_3;
        $translate->step_4 = $request->step_4;
        $translate->detils_4 = $request->detils_4;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
