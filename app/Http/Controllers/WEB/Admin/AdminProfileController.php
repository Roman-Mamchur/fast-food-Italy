<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\vendor_social_link;
use Auth;
use Validator;
use Hash;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($admin_id);
        return view('Admin.AdminProfile',compact('admin'));
    }


    public function ChnagePassword(Request $request)
    {
        try{
            $validate = Validator::make($request->all(),[
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);
            if($validate->fails())
            {
                $message = $validate->errors();
                $notification = array('message' => $message, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
            $admin = Auth::guard('admin')->user();

            if(Hash::check($request->old_password ,$admin->password))
            {
                $update = $admin->update([
                    'password' => Hash::make($request->password)
            ]);
                if($update)
                {
                    $message = "Password updated successfully";
                    $notification = array('message' => $message, 'alert-type' => 'success');
                    return redirect()->back()->with($notification);
                }
            }
            else{
                $message = "Your old password doesn't match";
                $notification = array('message' => $message, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }catch(\Exception $e)
        {
                $message = $e->getMessage();
                $notification = array('message' => $message, 'alert-type' => 'error');
                redirect()->back()->with($notification);
        }
    }
}
