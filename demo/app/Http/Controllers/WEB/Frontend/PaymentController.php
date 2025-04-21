<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PayPal\Api\Amount;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Mail\OrderSuccessfully;
use App\Models\Setting;
use PayPal\Api\Details;
use PayPal\Api\Item;

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\RazorpayPayment as RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\Flutterwave;
use App\Models\StripePayment;
use App\Models\PaystackAndMollie;
use App\Models\ApplyCoupon;
use App\Models\PayCash;
use App\Models\pricing_plan as PricingPlan;
use App\Models\PaypalPayment as PaypalPayment;
use Illuminate\Support\Facades\Crypt;

use Stripe;
use Redirect;
use Mail;
use Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Session;
use URL;
use Notification;
use Razorpay\Api\Api;

use Mollie\Laravel\Facades\Mollie;
use Ramsey\Uuid\Type\Decimal;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $account = PaypalPayment::first();
        $paypal_conf = \Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential(
            $account->client_id,
            $account->secret_id,
            )
        );

        $setting=array(
            'mode' => $account->account_mode,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR'
        );
        $this->apiContext->setConfig($setting);
    }


    public function payWithCash(){


        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $cashSetting = PayCash::first();
        $cart =  Cart::where('user_id',Auth::user()->id)->first();
        $foods = session('cart', []);
        $user = Auth::User();
        $cart = Cart::where('user_id',$user->id)->first();
        $order = $this->createOrder($user,$foods,$cart, 'CashOnDelivery', 'success', 0);

        $notification = trans('translate.Your order has been placed. Thanks for your order');
        $notification = array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.order.detils', $order->id)->with($notification);
    }
    public function payWithPaypal(){


        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $paypalSetting = PaypalPayment::first();

        $cart =  Cart::where('user_id',Auth::user()->id)->first();
        $payableAmount = $cart->grand_total * $paypalSetting->currency_rate;

        $name = env('APP_NAME');

        // set payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // set amount total
        $amount = new Amount();
        $amount->setCurrency($paypalSetting->currency_code)
            ->setTotal($payableAmount);

        // transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription(env('APP_NAME'));

        // redirect url
        $redirectUrls = new RedirectUrls();

        $root_url=url('/');
        $redirectUrls->setReturnUrl(route('paypal-payment-success'))
            ->setCancelUrl(route('paypal-payment-cancled'));

        // payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('checkout')->with($notification);
        }
        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
    }

    public function paypalPaymentSuccess(Request $request)
    {
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('checkout')->with($notification);
        }

        $payment_id=$request->get('paymentId');
        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {

            $foods = session('cart', []);
            $user = Auth::User();
            $cart = Cart::where('user_id',$user->id)->first();
            $order = $this->createOrder($user,$foods,$cart, 'Paypal', 'success', $payment_id);

            $notification = trans('translate.Your order has been placed. Thanks for your order');
            $notification = array('message'=>$notification,'alert-type'=>'success');
            return redirect()->route('user.order.detils', $order->id)->with($notification);


        }else{
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('select.payment.method')->with($notification);
        }
    }

    public function paypalPaymentCancled(){

        $notification = trans('translate.Payment Faild, please try again');
        $notification = array('message'=>$notification,'alert-type'=>'error');
        return redirect()->route('select.payment.method')->with($notification);
    }

    public function bankPayment(Request $request){

        if(env('APP_MODE') == 'DEMO'){
            $notification = 'This Is Demo Version. You Can Not Change Anything';
            $notification= array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $rules = [
            'tnx_info'=>'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('translate.Transaction is required'),
        ];
        $this->validate($request, $rules,$customMessages);


        $foods = session('cart', []);
        $user = Auth::User();

        $cart = Cart::where('user_id',$user->id)->first();
        $order = $this->createOrder($user,$foods,$cart, 'Bank payment', 'pending', $request->tnx_info);


        $message = trans('translate.Your order has been placed. please wait for admin payment approval');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->route('user.order.detils', $order->id)->with($notification);

    }

    public function payWithStripe(Request $request){
        dd($request->all());

        if(env('APP_MODE') == 'DEMO'){

            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
        

        $stripe = StripePayment::first();
        $cartData = $request->session()->get('cart', []); 
        $payment_method = "Stripe";
        $payment_status = "Pending";
        // $cart =  Cart::where('user_id', Auth::user()->id)->first();
        $grand_total = 0;
        foreach($cartData as $cart){
            $grand_total += $cart['total'];
        } 
        $payableAmount = round($grand_total * 3.67,2);
        Stripe\Stripe::setApiKey($stripe->stripe_secret);

        $result = Stripe\Charge::create ([
                "amount" => $payableAmount * 100,
                "currency" => $stripe->currency_code,
                "source" => $request->stripeToken,
                "description" => ''
            ]);

        // $foods = session('cart', []);
        
        // $order = $this->createOrder($user,$foods,$cart, 'Stripe', 'success', $result->balance_transaction);
        if(!Auth::user()){
            $check_user = User::where('email', $request->email)->first();
            if($check_user){
                $user_id = $check_user->id;
            }else {
                $newUser = new User();
                $newUser->name = $request->name1;
                $newUser->phone = $request->phone1;
                $newUser->email = $request->email1;
                $newUser->password = Hash::make('Password');
                $newUser->save();
                $user_id = $newUser->id;
            }
        } else {
            $user_id = Auth::user()->id;
        }
        $order = new Order();
        $order->user_id = $user_id;
        $order->type = 'pickup';
        $order->number_of_gest = 1;
        $order->address_id = 1;
        $order->delevery_day = $request->delevery_day1;
        $order->delevery_time_id = $request->delevery_time1;
        $order->note = $request->note1;
        $order->discount_amount = 0;
        $order->delevery_charge = 0;
        $order->vat_charge = 0;
        $order->total = $grand_total;
        // $order->total = $result->balance_transaction;
        $order->grand_total = $grand_total;
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
       // $order->order_status = 1;
        $order->order_status = 0;
        if ($order->save()) {
            // Save order items
            foreach ($cartData as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['product_id'];
                $orderItem->size = $item['size'];
                $orderItem->addons = $item['addons'];
                $orderItem->note = $item['note'];
                $orderItem->qty = $item['qty'];
                $orderItem->total = $item['total'];
                $orderItem->save();
            }

            // ApplyCoupon::where('user_id', auth()->user()->id)->delete();
            Session::forget('cart');
        }

        $message = trans('translate.Thanks for your order. Your order has been placed');
        $notification = array('message' => $message, 'alert-type' => 'success');
        if(auth()->user()){
            return redirect()->route('user.order.detils', $order->id)->with($notification);
        } else {
            return redirect()->route('thank.you', ['order' => Crypt::encrypt($order->id)])->with($notification);

        }
        $notification = trans('translate.Your order has been placed. Thanks for your order');
        $notification = array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.order.detils', $order->id)->with($notification);
    }

    public function payWithRazorpay(Request $request){

        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $razorpay = RazorpayPayment::first();
        $input = $request->all();
        $api = new Api($razorpay->key,$razorpay->secret_key);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $foods = session('cart', []);
                $user = Auth::User();
                $cart = Cart::where('user_id',$user->id)->first();
                $order = $this->createOrder($user,$foods,$cart, 'Razorpay', 'success', $payId);

                $notification = trans('translate.Your order has been placed. Thanks for your order');
                $notification = array('message'=>$notification,'alert-type'=>'success');
                return redirect()->route('user.order.detils', $order->id)->with($notification);

            }catch (Exception $e) {
                $notification = trans('translate.Payment Faild, please try again');
                $notification = array('message'=>$notification,'alert-type'=>'error');
                return redirect()->route('select.payment.method')->with($notification);
            }
        }else{
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('select.payment.method')->with($notification);
        }
    }

    public function paywithFlutterwave(Request $request)
     {
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $flutterwave = Flutterwave::first();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $flutterwave->secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){


            $foods = session('cart', []);
            $user = Auth::User();
            $cart = Cart::where('user_id',$user->id)->first();
            $order = $this->createOrder($user,$foods,$cart,'Flutterwave', 'success', $tnx_id);

            $redirect_url = route('user.order.detils', $order->id);

            $notification = trans('translate.Your order has been placed. Thanks for your order');
            return response()->json(['status' => 'success' , 'message' => $notification, 'redirect_url' => $redirect_url]);
        }else{
            $notification = trans('translate.Payment Faild, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }

    public function payWithMollie(Request $request){

        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $cart =  Cart::where('user_id',Auth::user()->id)->first();
        $mollie = PaystackAndMollie::first();
        $price = $cart->grand_total * $mollie->mollie_currency_rate;
        $price = round($price,2);
        $price = sprintf('%0.2f', $price);

        $mollie_api_key = $mollie->mollie_key;
        $currency = strtoupper($mollie->mollie_currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => ''.$price.'',
            ],
            'description' => env('APP_NAME'),
            'redirectUrl' => route('mollie-payment-success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
         session()->put('payment_id',$payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function molliePaymentSuccess(Request $request){
        $pricing_plan = Session::get('pricing_plan');
        $mollie = PaystackAndMollie::first();
        $mollie_api_key = $mollie->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){

            $foods = session('cart', []);
            $user = Auth::User();
            $cart = Cart::where('user_id',$user->id)->first();
            $order = $this->createOrder($user,$foods,$cart,'Mollie', 'success', session()->get('payment_id'));

            $notification = trans('translate.Your order has been placed. Thanks for your order');
            $notification = array('message'=>$notification,'alert-type'=>'success');
            return redirect()->route('user.order.detils', $order->id)->with($notification);
        }else{
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('select.payment.method')->with($notification);
        }
    }

    public function payWithPayStack(Request $request, $slug){

        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $paystack = PaystackAndMollie::first();

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $paystack->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $foods = session('cart', []);
            $user = Auth::User();
            $cart = Cart::where('user_id',$user->id)->first();
            $order = $this->createOrder($user,$foods,$cart,'Paystack', 'success', $transaction);

            $redirect_url = route('user.order.detils', $order->id);

            $notification = trans('translate.Your order has been placed. Thanks for your order');
            return response()->json(['status' => 'success' , 'message' => $notification, 'redirect_url' => $redirect_url]);
        }else{
            $notification = trans('translate.Payment Faild, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }
    public function payWithInstamojo(){

        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification=array('message'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
        $cart =  Cart::where('user_id',Auth::user()->id)->first();
        $instamojoPayment = InstamojoPayment::first();
        $price = $cart->grand_total * $instamojoPayment->currency_rate;
        $price = round($price,2);

        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $payload = Array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => 'Shihab',
            'redirect_url' => route('response-instamojo'),
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => 'shihab@gmaiul.com',
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        return redirect($response->payment_request->longurl);
    }

    public function instamojoResponse(Request $request){

        $pricing_plan = Session::get('pricing_plan');

        $input = $request->all();
        $instamojoPayment = InstamojoPayment::first();
        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('select.payment.method')->with($notification);
        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {

                $foods = session('cart', []);
                $user = Auth::User();
                $cart = Cart::where('user_id',$user->id)->first();
                $order = $this->createOrder($user,$foods,$cart,'Instamojo', 'success', $request->get('payment_id'));

                $notification = trans('translate.Your order has been placed. Thanks for your order');
                $notification = array('message'=>$notification,'alert-type'=>'success');
                return redirect()->route('user.order.detils', $order->id)->with($notification);

            }
        }else{
            $notification = trans('translate.Payment Faild, please try again');
            $notification = array('message'=>$notification,'alert-type'=>'error');
            return redirect()->route('select.payment.method')->with($notification);
        }
    }

    public function createOrder($user, $foods,$cart,$payment_method, $payment_status, $tnx_info)
    {
        $order = new Order();
        $order->user_id = $user->id;
        $order->type = 'pickup';
        $order->number_of_gest = 1;
        $order->address_id = '';
        $order->delevery_day = $cart->delevery_day;
        $order->delevery_time_id = $cart->delevery_time_id;
        $order->discount_amount = $cart->discount_amount;
        $order->delevery_charge = $cart->delevery_charge;
        $order->vat_charge = $cart->vat_charge;
        $order->total = $cart->total;
        $order->grand_total = $cart->grand_total;
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->tnx_info = $tnx_info;
        $order->order_status = 1;
        if($payment_status == 'success'){
            $order->order_status = 1;
        }
        $order->save();

        foreach ($foods as $food) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $food['product_id'];
            $orderItem->size = $food['size'];
            $orderItem->addons = $food['addons'];
            $orderItem->qty = $food['qty'];
            $orderItem->total = $food['total'];
            $orderItem->save();
        }

        Cart::where('user_id', $user->id)->delete();
        ApplyCoupon::where('user_id', $user->id)->delete();
        Session::forget('cart');

        return $order;
    }

}
