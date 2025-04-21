<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
 use Validator;

class SEOSetupController extends Controller
{
    public function index()
    {
        $seo_setting =  SeoSetting::all();
        return view('Admin.SEOSetup',compact('seo_setting'));
    }
    public function SEOUpdate(Request $request,$id)
    {
       try{

        $validate = Validator::make($request->all(),[
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
        ]);
        if($validate->fails())
        {
            $message = $validate->fails();
            $notification = array('message' => $message,'alert-type' => 'error');
            return redirect()->back()->witht($notification);
        }
        $update = SeoSetting::where('id',$id)->update([
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description
        ]);
        if($update)
        {
            $message = "Updated Successfully!!";
            $notification = array('message' => $message,'alert-type' => 'success');
            return redirect()->back()->witht($notification);
        }

       }catch(\Exception $e)
       {
            $message = $e->getMessage();
            $notification = array('message' => $message,'alert-type' => 'error');
            return redirect()->back()->witht($notification);
       }

    }
}
