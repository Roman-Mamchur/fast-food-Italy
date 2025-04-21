<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Admin;
use App\Models\vendor_social_link;
use App\Models\maintainance_text;
use App\Models\LoginActivity;
use App\Models\EmailConfiguration;

use App\Models\StripePayment;
use App\Models\Flutterwave;
use App\Models\PaystackAndMollie;
use App\Models\RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\paypal_payment;
use App\Models\pricing_plan;
use App\Models\AppLink;
use App\Models\GoogleRecaptcha;
use App\Models\GoogleAnalytic;
use App\Models\TawkChat;
use App\Models\Language;
use Validator;
use Hash;
use Image;
use Str;
use Auth;


class SettingsController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $admin_id = $admin->id;

        $ip = request()->ip();
        $app = request('User-Agent');
        $login_activity = LoginActivity::where('admin_id',$admin_id)->get();
        $setting = Setting::first();
        $admin = Admin::find($admin_id);
        $email_configuration = EmailConfiguration::first();

        $flutterwave = Flutterwave::first();
        $stripe_payment = StripePayment::select('stripe_key')->first();
        $razorpay = RazorpayPayment::first();
        $app_link = AppLink::first();
        $googleRecaptcha = GoogleRecaptcha::first();
        $tawk_chat = TawkChat::first();
        $googleAnalytic = GoogleAnalytic::first();
        $languages = Language::orderBy('id','ASC')->get();
        return view('Admin.Settings',compact('setting','admin','login_activity','email_configuration','app_link','googleRecaptcha','tawk_chat','googleAnalytic','languages'));
    }


    public function ChnageLoginPageImages(Request $request)
    {

        try{

        $setting = Setting::find(1);

        if(!empty($request->logo))
        {
            $extention = $request->logo->getClientOriginalExtension();
            $logo_name = Str::slug("login_page_logo").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/website-images/'.$logo_name;
            Image::make($request->logo)
                ->save(public_path().'/'.$logo_name);
        }
        else{
            $logo_name = $setting->logo;
        }

        if(!empty($request->stiky_logo))
        {
            $extention = $request->stiky_logo->getClientOriginalExtension();
            $stiky_logo = Str::slug("stiky_logo").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $stiky_logo = 'uploads/website-images/'.$stiky_logo;
            Image::make($request->stiky_logo)
                ->save(public_path().'/'.$stiky_logo);
        }
        else{
            $stiky_logo = $setting->stiky_logo;
        }


        if(!empty($request->favicon))
        {
            $extention = $request->favicon->getClientOriginalExtension();
            $favicon = Str::slug("website-favicon").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $favicon = 'uploads/website-images/'.$favicon;
            Image::make($request->favicon)
                ->save(public_path().'/'.$favicon);
        }
        else{
            $favicon = $setting->favicon;
        }
        if(!empty($request->login_page_image))
        {
            $extention = $request->login_page_image->getClientOriginalExtension();
            $image_name = Str::slug("login_page_image").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/website-images/'.$image_name;
            Image::make($request->login_page_image)
                ->save(public_path().'/'.$image_name);
        }
        else{
            $image_name = $setting->login_page_image;
        }
        if(!empty($request->login_page_bg))
        {
            $extention = $request->login_page_bg->getClientOriginalExtension();
            $bg_name = Str::slug("login_page_bg").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $bg_name = 'uploads/website-images/'.$bg_name;
            Image::make($request->login_page_bg)
                ->save(public_path().'/'.$bg_name);
        }
        else{
            $bg_name = $setting->login_page_bg;
        }

        if(!empty($request->frontend_logo))
        {
            $extention = $request->frontend_logo->getClientOriginalExtension();
            $frontend_logo = Str::slug("login_page_logo").date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $frontend_logo = 'uploads/website-images/'.$frontend_logo;
            Image::make($request->frontend_logo)
                ->save(public_path().'/'.$frontend_logo);
        }
        else{
            $frontend_logo = $setting->frondend_logo;
        }

        if(!empty($request->frontend_login))
        {
            $extention = $request->frontend_login->getClientOriginalExtension();
            $frontend_login = Str::slug("login_page_logo").date('-Y-m-d-h-i-s').rand(999,9999).'.'.$extention;
            $frontend_login = 'uploads/website-images/'.$frontend_login;
            Image::make($request->frontend_login)
                ->save(public_path().'/'.$frontend_login);
        }
        else{
            $frontend_login = $setting->frondend_login_page;
        }

        $updated = $Setting::where('id',1)->update([

            'logo' => $logo_name,
            'login_page_image' => $image_name,
            'login_page_bg' => $bg_name,
            'frondend_login_page' => $frontend_login,
            'frondend_logo' => $frontend_logo,
            'stiky_logo' => $stiky_logo,
            'favicon' => $favicon
        ]);
        if($updated){

            $message = "Update successfully";
            $notification = array('message' => $message,'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message,'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function UpdateProfile(Request $request,$id)
    {
        try{

            $validate = Validator::make($request->all(),[
                'name' => 'required|string',
                'email' => 'required|string',
            ]);

            if($validate->fails()){
                return $validate->errors();
            }
            $admin = Admin::find($id);
            $old_image = $admin->image;
            if($request->image){
                $extention = $request->image->getClientOriginalExtension();
                $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $image_name = 'uploads/custom-images/'.$image_name;
                Image::make($request->image)
                    ->save(public_path().'/'.$image_name);
            }else{
                $image_name = $old_image;
            }
            $update_admin = Admin::where('id',$id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'image' => $image_name,
            ]);
            if($update_admin){
                $message = "Updated successfully";
                $notification = array('message'=>$message,'alert-type'=>'success');
                return redirect()->back()->with($notification);
            }

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message'=>$message,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }


    public function AddSocialLink(Request $request)
    {
            $admin_id = Auth::guard('admin')->user()->id;
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',
                'icon' => 'required',
                'link' => 'required',
                'status' => 'required'
            ]);
            if($validate->fails()){
                return redirect()->back()->with('Emsg',$validate->errors());
            }
            $vendor_link_setup = vendor_social_link::create([
                'name' => $request->name,
                'vendor_id' => 0,
                'admin_id' => $admin_id,
                'icon' => $request->icon,
                'link' => $request->link,
                'status' => $request->status
            ]);
            if($vendor_link_setup)
            {
                $message = "Added social link";
                $notification = array('message' => $message, 'alert-type'=> 'success');
                return redirect()->back()->with($notification);
            }
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $messagem, 'alert-type'=> 'error');
            return redirect()->back()->with($notification);

        }
    }
    //Delete Social Account
    public function DeleteSocialLink($id)
    {
        try{
            $social_link  = vendor_social_link::find($id);
        $delete = $social_link->delete();
        if($delete)
        {
            $message = "Delete Social Icon Successfully";
            $notification = array('message' => $message, 'alert-type'=> 'success');
            return redirect()->back()->with($notification);
        }
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type'=> 'success');
            return redirect()->back()->with($notification);
        }
    }
    public function DeleteLoginActivity($id)
    {
        try
        {

            $login_activity = LoginActivity::find($id);
        $delete = $login_activity->delete();
        if($delete)
        {
            $message = "Delete Login History";
            $notification = array('message' => $message, 'alert-type'=> 'success');
            return redirect()->back()->with($notification);
        }

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type'=> 'success');
            return redirect()->back()->with($notification);
        }
    }
    public function generalSetting(Request $request,$id)
    {

        $validate = Validator::make($request->all(),[
            'theam' => 'required',
            'currency_name' =>'required',
            'currency_icon' =>'required',
            'vat_rate' =>'required',
            'app_visibility' =>'required',
            'lang_key' =>'required',

        ]);
        if($validate->fails())
        {
            $message = $validate->erros();
            $notification = array('message' => $message, 'alert-type' =>'error');
            return redirect()->back()->with($notification);
        }
        try{


            Setting::where('id',$id)->update([
                'theam' => $request->theam,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'vat_rate' => $request->vat_rate,
                'timezone' => $request->timezone,
                'app_visibility' => $request->app_visibility,
                'app_name' => $request->app_name,
                'lang_key' => $request->lang_key,
            ]);
            $message = "Successfully Updated!!";
            $notification = array('message' => $message, 'alert-type' =>'success');
            return redirect()->back()->with($notification);
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' =>'success');
            return  redirect()->back()->with($notification);
        }
    }


    public function emailConfigaration(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'smtp_username' => 'required|string',
            'smtp_password' => 'required',
            'mail_encryption' => 'required',
            'email' => 'required|email|string',
        ]);
        if($validate->fails())
        {
            $message = $validate->errors();
            $notification = array('message' => $message, 'alert-type' =>'error');
            return redirect()->back()->with($notification);
        }
        $email_configuration = email_configuration::first();
        $email_configuration->update([
            'mailer' => $request->mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'smtp_username' => $request->smtp_username,
            'smtp_password' => $request->smtp_password,
            'mail_encryption' => $request->mail_encryption,
            'email' => $request->email,
        ]);
        $message = "Email Credantail updated successfully!!";
        $notification = array('message' => $message, 'alert-type' =>'success');
        return redirect()->back()->with($notification);

    }




    public function AppLinkUpdate(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            'android_link' => 'required',
            'ios_link' => 'required',
        ]);
        if($validate->fails())
        {
            $message = $validate->errors();
            $notification = array('message' => $message, 'alert-type' =>'error');
            return redirect()->back()->with($notification);
        }

        $app_link = app_link::find($id);
        $old_image = $app_link->image;
        $old_android_app_image = $app_link->android_link_image;
        $old_ios_app_image = $app_link->ios_link_image;

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image = 'uploads/web-image/'.$image;
            Image::make($request->image)
                ->save(public_path().'/'.$image);
        }else{
            $image = $old_image;
        }

        if($request->android_link_image){
            $extention = $request->android_link_image->getClientOriginalExtension();
            $android_link_image = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $android_link_image = 'uploads/web-image/'.$android_link_image;
            Image::make($request->android_link_image)
                ->save(public_path().'/'.$android_link_image);
        }else{
            $android_link_image = $old_android_app_image;
        }

        if($request->ios_link_image){
            $extention = $request->android_link_image->getClientOriginalExtension();
            $ios_link_image = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $ios_link_image = 'uploads/web-image/'.$ios_link_image;
            Image::make($request->ios_link_image)
                ->save(public_path().'/'.$ios_link_image);
        }else{
            $ios_link_image = $old_ios_app_image;
        }

        app_link::where('id',$id)->update([
            'image' => $image,
            'android_link' => $request->android_link,
            'ios_link' => $request->ios_link,
            'android_link_image' => $android_link_image,
            'ios_link_image' => $ios_link_image,
        ]);
        $message = "Updated successfully!!";
        $notification = array('message' => $message, 'alert-type' =>'success');
        return redirect()->back()->with($notification);

    }
    public function updateGoogleRecaptcha(Request $request)
    {

        $google = GoogleRecaptcha::first();

        $google->site_key = $request->site_key;
        $google->secret_key = $request->secret_key;
        $google->status = $request->status;
        $google->save();

        $message = "Updated successfully!!";
        $notification = array('message' => $message, 'alert-type' =>'success');
        return redirect()->back()->with($notification);

    }

    public function updateTawkIo(Request $request)
    {

        $tawk = TawkChat::first();
        $tawk->chat_link = $request->chat_link;
        $tawk->status = $request->status;
        $tawk->save();

        $message = "Updated successfully!!";
        $notification = array('message' => $message, 'alert-type' =>'success');
        return redirect()->back()->with($notification);
    }

    public function updateGoogleAnalytic(Request $request)
    {

        $google_analytic = GoogleAnalytic::first();
        $google_analytic->analytic_id = $request->analytic_id;
        $google_analytic->status = $request->status;
        $google_analytic->save();

        $message = "Updated successfully!!";
        $notification = array('message' => $message, 'alert-type' =>'success');
        return redirect()->back()->with($notification);
    }


}
