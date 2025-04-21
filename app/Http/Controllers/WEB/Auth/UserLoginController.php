<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SectionTitel;
use App\Models\PasswordReset;

use Carbon\Carbon;
use Hash;
use Validator;
use Auth;
use Session;
use Str;
use URL;
use Mail, Config;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Mail\UserForgetPassword;
use App\Mail\UserForgetPasswordForOTP;
use App\Mail\UserRegistration;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserLoginController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email',
                'errors' => 'You are not registred please sign up',
            ]);
        }

        if ($user->verify_token != null) {
            return response()->json([
                'success' => false,
                'message' => 'Please verify your email',
            ]);
        }
        $cart = session()->get('cart', []);
        if ($cart != [] && Auth::attempt($request->only('email', 'password'))) {
            if (Auth::attempt($request->only('email', 'password'))) {
                $message = trans('translate.Login successfully');
                $notification = array('message' => $message, 'alert-type' => 'success');
                return response()->json([
                    'success' => true,
                    'message' => 'Login successfully',
                    'redirect_url' => route('checkout'), // Replace with your desired redirect route
                ]);
            }
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
                'errors' => 'Wrong password',
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'redirect_url' => route('index'), // Replace with your desired redirect route
        ]);
    }



    public function registerView()
    {
        return view('Frontend.Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'phone' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'email.unique' => 'Email already exist please sign in',
            'password.required' => 'Password is required',
            'password.min' => 'You have to provide minimum 8 characters',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'verify_token' => null,
        ]);
        // 'verify_token' => Str::random(100),

        // $domain = URL::to('/');
        // $verify_link = $domain.'/verify/user/email?token='.$user->verify_token.'&email='.$user->email;
        // $verify_link = '<a href="'.$verify_link.'">'.$verify_link.'</a>';

        // MailHelper::setMailConfig();

        // $template = EmailTemplate::where('id',4)->first();
        // $subject = $template->subject;
        // $message = $template->description;
        // $message = str_replace('{{user_name}}',$request->name,$message);
        // $message = str_replace('{{verify_link}}',$verify_link,$message);
        // Mail::to($user->email)->send(new UserRegistration($message,$subject));

        $message = trans('Successfully Register');
        $notification = array('message' => $message, 'alert-type' => 'success');
        $cart = session()->get('cart', []);
        if ($cart != [] && Auth::attempt($request->only('email', 'password'))) {
            if (Auth::attempt($request->only('email', 'password'))) {
                $message = trans('translate.Login successfully');
                $notification = array('message' => $message, 'alert-type' => 'success');
                return response()->json([
                    'message' => trans('Successfully Register'),
                    'redirect_url' => route('checkout')
                ], 200);
            }
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => trans('Successfully Register'),
                'redirect_url' => route('index')
            ], 200);
        }
        return redirect()->back()->with('success', trans('Successfully Register'));
        // return redirect()->back()->with($notification);
    }


    public function verify_user_email(Request $request)
    {

        $user = User::where([
            'email' => $request->email,
            'verify_token' => $request->token,
        ])->first();

        if ($user) {
            $user->verify_token = null;
            $user->save();

            $message = trans('translate.Verify successful, please try to login');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->route('login')->with($notification);
        } else {
            $message = trans('translate.Something went wrong, please try again');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function LogOut()
    {
        Session::flush();
        Auth::logout();

        $message = trans('translate.Logout successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->route('index')->with($notification);
    }

    public function Forgot()
    {
        return view('Frontend.Auth.reset');
    }
    public function ForgotAdmin()
    {
        return view('Admin.Auth.reset');
    }

    public function ForgotPassword(Request $request)
    {
        $user = user::where('email', $request->email)->first();
        if ($user) {
            $token = rand(100000, 999999); // Generate a 6-digit OTP
            if($request->type == 'password'){
                $data = [
                    'email' => $request->email,
                    'title' => "Reset Password",
                    'body' => "Use the following 6-digit token to reset your password:",
                    'token' => $token, // Attach token to the data
                ];
            } else {
                $data = [
                    'email' => $request->email,
                    'title' => "Update Email",
                    'body' => "Use the following 6-digit token to update your email:",
                    'token' => $token, // Attach token to the data
                ];
            }

            // Send the email using your Mailable
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
                'type' => $request->type,
                'success' => true,
            ]);
            // return redirect()->back()->with($notification);
        } else {
            $message = trans('translate.Email not found');
            // $notification = array('message' => $message, 'alert-type' => 'error');
            // return redirect()->back()->with($notification);
            return response()->json([
                'message' => $message,
                'error' => false,
            ], 404);
        }
    }
    public function ForgotPasswordAdmin(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            // $token = rand(100000, 999999); // Generate a 6-digit OTP
            // $domain = URL::to('/');
            // $url = $domain.'admin/reset/password?token=343254564565';
            // $url = '<a href="'.$url.'">'.$url.'</a>';
            // $data = [
            //     'email' => $request->email,
            //     'title' => "Reset Password",
            //     'body' => $url,
            //     // 'token' => $token, // Attach token to the data
            // ];
            // Send the email using your Mailable
            // $forgetEmail = new UserForgetPasswordForOTP($data);
            // Mail::to($data['email'])->send($forgetEmail);

            // $dateTime = Carbon::now()->format('Y-m-d H:i:s');
            // $setToken = PasswordReset::updateOrCreate(
            //     ['email' => $request->email],
            //     [
            //         'email' => $request->email,
            //         'token' => $token,
            //         'created_at' => $dateTime
            //     ]
            // );
            $notification = 'OTP has been sent to your email address.';
            // return redirect()->back([
            //     'type' => $request->type,
            //     'success' => true,
            // ]);
            return redirect('reset.password.admin');
        } else {
            $message = trans('translate.Email not found');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
            // return response()->json([
            //     'message' => $message,
            //     'error' => false,
            // ], 404);
        }
    }
    

    public function otpPassword(Request $request)
    {
        $token = $request->token;
        $record = PasswordReset::where('token', $request->token)->first();
        if ($record) {
            $user = AuthUser::where('email', $request->email)->first();
            return response()->json([
                'message' => 'Valid Token',
                'success' => true,
                'user' => $user->id
            ]);
            // return view('Frontend.Auth.reset_password', compact('user', 'section'));
        } else {
            $message = trans('translate.Something went wrong, please try again');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return response()->json([
                'message' => 'Invalide Token',
                'error' => false,
            ], 404);
            // return redirect()->route('forgot.password.user')->with($notification);
        }
    }
    public function ResetPassword(Request $request)
    {
        $section =  SectionTitel::first();
        $token = $request->token;
        $email = PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($email) > 0) {
            $user = user::where('email', $email[0]['email'])->get();
            return view('Frontend.Auth.reset_password', compact('user', 'section'));
        } else {
            $message = trans('translate.Something went wrong, please try again');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('forgot.password.user')->with($notification);
        }
    }
    public function ResetPasswordAdmin(Request $request)
    {
        // $section =  SectionTitel::first();
        // $token = $request->token;
        // $email = PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($email) > 0) {
            // $user = user::where('email', $email[0]['email'])->get();
            $request->validate([
                'password' => 'required|min:8'
            ]);
            $admin = Admin::where('email', $request->email)->first();
            return view('Admin.Auth.reset_password', );
        } else {
            $message = trans('translate.Something went wrong, please try again');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('forgot.password.user')->with($notification);
        }
    }

    public function SetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8'
        ]);


        $admin = user::find($request->passordUser);

        $update = $admin->update([
            'password' => Hash::make($request->password)
        ]);
        if ($update) {
            $message = trans('translate.Password reset successful. please try to login');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return response()->json([
                'message' => $message,
                'success' => true,
            ]);
            // return redirect()->route('login')->with($notification);
        } 
    }
    public function SetEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);


        $admin = user::find($request->emailUser);

        $update = $admin->update([
            'email' => $request->email
        ]);
        if ($update) {
            $message = trans('Email reset successful. please try to login');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return response()->json([
                'message' => $message,
                'success' => true,
            ]);
            // return redirect()->route('login')->with($notification);
        }
    }
    
}
