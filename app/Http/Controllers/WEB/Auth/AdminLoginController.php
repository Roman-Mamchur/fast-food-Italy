<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\LoginActivity;
use App\Models\Setting;
use Illuminate\Support\Facades\Redirect;
Use Hash;
use Auth;
use Validator;

class AdminLoginController extends Controller
{

    public function index(){
        $setting = Setting::first();
        return view('Admin.Auth.Login');
    }
    
    public function Login(Request $request){

        try{

            $validate = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validate->fails())
            {
                $message = $validate->errors();
                $notification = array('message' => $message, 'alert-type' => 'success');
                return redirect()->route('admin.dashboard')->with($notification);
            }

            $credential=[
                'email'=> $request->email,
                'password'=> $request->password
            ];

            $isAdmin=Admin::where('email',$request->email)->first();
            
           

            if($isAdmin){
                if($isAdmin->status == 1){
                    
                        if(Auth::guard('admin')->attempt($credential)) {
                            
                            $message = "Login successfully";
                            $notification = array('message' => $message, 'alert-type' => 'success');
                            return redirect()->route('admin.dashboard')->with($notification);
                        }
                        else{
                            
                            $message = "Invalide Account";
                            $notification = array('message' => $message, 'alert-type' => 'error');
                            return redirect()->back()->with($notification);
                        }
                }
                
                 
                        $message = "Admin Deactive your acoount";
                        $notification = array('message' => $message, 'alert-type' => 'success');
                        return redirect()->back()->with($notification);
            }else{
                $message = "Your email is not valide ";
                $notification = array('message' => $message, 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

    }
    
    public function Logout()
    {
        Auth::guard('admin')->logout();
        $message = "Logout Successfully";
        $notification=array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('admin.login.index')->with($notification);
    }
    public function orderLogout()
    {
        Auth::guard('admin')->logout();

        $message = "Logout Successfully";
        $notification=array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('order.management')->with($notification);
    }

    public function orderLogin(){
        $setting = Setting::first();
        return view('Admin.Auth.orderLogin');
    }
    public function orderLoginL(Request $request){

        try{

            $validate = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validate->fails())
            {
                $message = $validate->errors();
                $notification = array('message' => $message, 'alert-type' => 'success');
                return redirect()->route('order.login')->with($notification);
            }

            $credential=[
                'email'=> $request->email,
                'password'=> $request->password
            ];

            $isAdmin=Admin::where('email',$request->email)->first();
            
           

            if($isAdmin){
                if($isAdmin->status == 1){
                    
                        if(Auth::guard('admin')->attempt($credential)) {
                            
                            $message = "Login successfully";
                            $notification = array('message' => $message, 'alert-type' => 'success');
                            return redirect()->route('order.management')->with($notification);
                        }
                        else{
                            $message = "Invalide Account";
                            $notification = array('message' => $message, 'alert-type' => 'error');
                            return redirect()->back()->with($notification);
                        }
                }
                
                 
                        $message = "Admin Deactive your acoount";
                        $notification = array('message' => $message, 'alert-type' => 'success');
                        return redirect()->back()->with($notification);
            }else{
                $message = "Your email is not valide ";
                $notification = array('message' => $message, 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

    }
  }

