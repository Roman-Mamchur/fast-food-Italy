<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StripePayment;
use App\Models\Flutterwave;
use App\Models\PaystackAndMollie;
use App\Models\InstamojoPayment;
use App\Models\PaypalPayment;
use App\Models\RazorpayPayment as RazorpayPayment;
use App\Models\BankPayment;
use App\Models\PayCash;
use Image, File, Str;

class PaymentController extends Controller
{
    public function index()
    {
        $cash_payment    = PayCash::first();
        $paypal_payment    = PaypalPayment::first();
        $stripe_payment    = StripePayment::first();
        $flutterwave       = Flutterwave::first();
        $PaystackAndMollie = PaystackAndMollie::first();
        $razorpay_payment  = RazorpayPayment::first();
        $InstamojoPayment  = InstamojoPayment::first();
        $bankPayment  = BankPayment::first();

        return view('Admin.Payment', compact('cash_payment', 'paypal_payment','stripe_payment','flutterwave','PaystackAndMollie','razorpay_payment','InstamojoPayment','bankPayment'));
    }
    public function cashCredentialUpdate(Request $request){
        $status = 0;
        $cash = PayCash::first();
        $cash->name = 'Cash On Delivery';
        if(!empty($request->status))
        {
            $status = 1;
        }
        $cash->status = $status;
        if($request->cash_image){
            $old_cash_image = $cash->cash_image;
            $extention = $request->cash_image->getClientOriginalExtension();
            $image_name = Str::slug('cash_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $cash_image = 'uploads/website-images/'.$image_name;
            Image::make($request->cash_image)
                ->save(public_path().'/'.$cash_image);

            $cash->cash_image = $cash_image;

            if($old_cash_image){
                if(File::exists(public_path().'/'.$old_cash_image))unlink(public_path().'/'.$old_cash_image);
            }

        }
        $cash->save();

        $notification='Updated Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
    public function paypalCredentialUpdate(Request $request)
    {


        $status = 0;
        $paypal = PaypalPayment::first();
        $paypal->client_id = $request->paypal_client_id;
        $paypal->secret_id = $request->paypal_secret_key;
        $paypal->account_mode = $request->account_mode;
        $paypal->country_code = $request->country_name;
        $paypal->currency_code = $request->currency_name;
        $paypal->currency_rate = $request->currency_rate;
        if(!empty($request->status))
        {
            $status = 1;
        }
        $paypal->status = $status;
        $paypal->save();

        if($request->paypal_image){
            $old_paypal_image = $paypal->paypal_image;
            $extention = $request->paypal_image->getClientOriginalExtension();
            $image_name = Str::slug('paypal_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $paypal_image = 'uploads/website-images/'.$image_name;
            Image::make($request->paypal_image)
                ->save(public_path().'/'.$paypal_image);

            $paypal->paypal_image = $paypal_image;
            $paypal->save();

            if($old_paypal_image){
                if(File::exists(public_path().'/'.$old_paypal_image))unlink(public_path().'/'.$old_paypal_image);
            }

        }

        $notification='Updated Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function StripeCredentialUpdate(Request $request){

        $status = 0;
        $stripe = StripePayment::first();
        $stripe->stripe_key = $request->stripe_key;
        $stripe->stripe_secret = $request->stripe_secret;
        $stripe->country_code = $request->country_name;
        $stripe->currency_code = $request->currency_name;
        $stripe->currency_rate = $request->currency_rate;
        if(!empty($request->status))
        {
            $status = 1;
        }
        $stripe->status = $status;
        $stripe->save();

        if($request->stripe_image){
            $old_stripe_image = $stripe->image;
            $extention = $request->stripe_image->getClientOriginalExtension();
            $image_name = Str::slug('stripe_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $stripe_image = 'uploads/website-images/'.$image_name;
            Image::make($request->stripe_image)
                ->save(public_path().'/'.$stripe_image);

            $stripe->image = $stripe_image;
            $stripe->save();

            if($old_stripe_image){
                if(File::exists(public_path().'/'.$old_stripe_image))unlink(public_path().'/'.$old_stripe_image);
            }

        }

        $notification='Updated Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function updateRazorpay(Request $request){


        $status = 0;
        $razorpay = RazorpayPayment::first();
        $razorpay->key = $request->razorpay_key;
        $razorpay->secret_key = $request->razorpay_secret;
        $razorpay->name = $request->name;
        $razorpay->currency_rate = $request->currency_rate;
        $razorpay->description = $request->description;
        $razorpay->color = $request->theme_color;
        $razorpay->country_code = $request->country_name;
        $razorpay->currency_code = $request->currency_name;
        if(!empty($request->status))
        {
            $status = 1;
        }
        $razorpay->status = $status;
        $razorpay->save();

        if($request->razorpay_image){
            $old_razorpay_image = $razorpay->image;
            $extention = $request->razorpay_image->getClientOriginalExtension();
            $image_name = Str::slug('razorpay_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $razorpay_image = 'uploads/website-images/'.$image_name;
            Image::make($request->razorpay_image)
                ->save(public_path().'/'.$razorpay_image);

            $razorpay->image = $razorpay_image;
            $razorpay->save();

            if($old_razorpay_image){
                if(File::exists(public_path().'/'.$old_razorpay_image))unlink(public_path().'/'.$old_razorpay_image);
            }

        }

        $notification='Update Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function updatePaystack(Request $request){

        try{

            $status = 0;
            $paystact = PaystackAndMollie::first();
            $paystact->paystack_public_key = $request->paystack_public_key;
            $paystact->paystack_secret_key = $request->paystack_secret_key;
            $paystact->paystack_currency_code = $request->currency_name;
            $paystact->paystack_country_code = $request->country_name;
            $paystact->paystack_currency_rate = $request->currency_rate;
            if(!empty($request->status))
            {
                $status = 1;
            }
            $paystact->paystack_status = $status;
            $paystact->save();

            if($request->paystack_image){
                $old_paystack_image = $paystact->paystack_image;
                $extention = $request->paystack_image->getClientOriginalExtension();
                $image_name = Str::slug('paystack_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $paystack_image = 'uploads/website-images/'.$image_name;
                Image::make($request->paystack_image)
                    ->save(public_path().'/'.$paystack_image);

                $paystact->paystack_image = $paystack_image;
                $paystact->save();

                if($old_paystack_image){
                    if(File::exists(public_path().'/'.$old_paystack_image))unlink(public_path().'/'.$old_paystack_image);
                }

            }

            $notification='Update Successfully';
            $notification=array('message'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }catch(Exception $e)
        {

        }
    }

    public function updateFlattuerwave(Request $request){
        $status = 0;
        $flutterwave = Flutterwave::first();
        $flutterwave->public_key = $request->public_key;
        $flutterwave->secret_key = $request->secret_key;
        $flutterwave->title = $request->title;
        $flutterwave->currency_rate = $request->currency_rate;
        $flutterwave->country_code = $request->country_name;
        $flutterwave->currency_code = $request->currency_name;
        if(!empty($request->status))
        {
            $status = 1;
        }
        $flutterwave->status = $status;
        $flutterwave->save();

        if($request->flutterwave_image){
            $old_flutterwave_image = $flutterwave->logo;
            $extention = $request->flutterwave_image->getClientOriginalExtension();
            $image_name = Str::slug('flutterwave_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $flutterwave_image = 'uploads/website-images/'.$image_name;
            Image::make($request->flutterwave_image)
                ->save(public_path().'/'.$flutterwave_image);

            $flutterwave->logo = $flutterwave_image;
            $flutterwave->save();

            if($old_flutterwave_image){
                if(File::exists(public_path().'/'.$old_flutterwave_image))unlink(public_path().'/'.$old_flutterwave_image);
            }

        }

        $notification='Update Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function updateInstamojo(Request $request){

        try{

            $status = 0;
            $instamojo = InstamojoPayment::first();
            $instamojo->account_mode = $request->account_mode;
            $instamojo->api_key = $request->api_key;
            $instamojo->auth_token = $request->auth_token;
            $instamojo->currency_rate = $request->currency_rate;
            if(!empty($request->status))
            {
                $status = 1;
            }
            $instamojo->status = $status;
            $instamojo->save();

            if($request->instamojo_image){
                $old_instamojo_image = $instamojo->image;
                $extention = $request->instamojo_image->getClientOriginalExtension();
                $image_name = Str::slug('instamojo_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $instamojo_image = 'uploads/website-images/'.$image_name;
                Image::make($request->instamojo_image)
                    ->save(public_path().'/'.$instamojo_image);

                $instamojo->image = $instamojo_image;
                $instamojo->save();

                if($old_instamojo_image){
                    if(File::exists(public_path().'/'.$old_instamojo_image))unlink(public_path().'/'.$old_instamojo_image);
                }

            }

            $notification='Update Successfully';
            $notification=array('message'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }catch(Exception $e)
        {
            $notification=$e->getMessage();
            $notification=array('message'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }

    public function updateBank(Request $request){

        $status = 0;
        if(!empty($request->status))
        {
            $status = 1;
        }

        $bankPayment  = BankPayment::first();
        $bankPayment->account_info = $request->account_info;
        $bankPayment->status = $status;
        $bankPayment->save();

        if($request->bank_image){
            $old_bank_image = $bankPayment->image;
            $extention = $request->bank_image->getClientOriginalExtension();
            $image_name = Str::slug('bank_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $bank_image = 'uploads/website-images/'.$image_name;
            Image::make($request->bank_image)
                ->save(public_path().'/'.$bank_image);

            $bankPayment->image = $bank_image;
            $bankPayment->save();

            if($old_bank_image){
                if(File::exists(public_path().'/'.$old_bank_image))unlink(public_path().'/'.$old_bank_image);
            }

        }

        $message = trans('translate.Update Successfully');
        $notification=array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



}
