<?php

namespace App\Http\Controllers\WEB\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserForgetPasswordForOTP;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Str;
use URL;
use Mail;
use Validator;
use Hash;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('Admin.Auth.ForgotPassword');
    }
    public function ForgotPassword(Request $request)
    {

            $user = user::where('email',$request->email)->get();
            if(count($user) > 0)
            {
                // $token = Str::random(50);
                // $domain = URL::to('/');
                // $url = $domain.'/reset-password?token='.$token;
                $token = rand(100000, 999999); // Generate a 6-digit OTP

                $data = [
                    'email' => $request->email,
                    'title' => "Reset Password",
                    'body' => "Use the following 6-digit token to reset your password:",
                    'token' => $token, // Attach token to the data
                ];
    
                // Send the email using your Mailable
                // Mail::to($data['email'])->send(new UserForgetPasswordForOTP($data));
                // $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Reset Password";
                $data['body'] = "Plese click here too reset your password";


                // $sendEmail = Mail::send('Admin.Auth.SendEmail',['data'=>$data],function($message) use ($data){
                //     $message->to($data['email'])->subject($data['title']);
                // });

                $forgetEmail = new UserForgetPasswordForOTP($data);
                Mail::to($data['email'])->send($forgetEmail);


                $dateTime = Carbon::now()->format('Y-m-d H:i:s');
                $setToken = PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                );
                return response()->json([
                    'message' => 'OTP has been sent to your email address.',
                    'success' => true,
                ]);
                // $message = "Please cheack your email & change password";
                // $notification = array('message' => $message,'alert-type' => 'success');
                // return redirect()->back()->with($notification);

            }else{
                $message = "Email not found";
                $notification = array('message'=> $message,'alert-type' => 'error');
                return redirect()->route('admin.reset.password')->with($notification);
            }


    }
    public function ResetPassword(Request $request)
    {
        $token = $request->token;
        $email = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($email)>0)
        {
            $user = Admin::where('email',$email[0]['email'])->get();
            return view('Admin.Auth.ResetPassword',compact('user'));
        }
        else{
            return view('Admin.Auth.404');
        }

    }
    public function SetPassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'password' => 'required|confirmed'
        ]);
        if($validate->fails())
        {
            $message = $validate->errors();
            $notification = array('message' => $message,'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        $admin = Admin::find($request->id);

        $update = $admin->update([
            'password' => Hash::make($request->password)
        ]);
        if($update)
        {
            $message = "Updated your password";
            $notification = array('message'=> $message,'alert-type' => 'success');
            return redirect()->route('admin.login.index')->with($notification);
        }
    }
}
