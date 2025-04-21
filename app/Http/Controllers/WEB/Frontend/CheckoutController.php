<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Models\SeoSetting;
use App\Models\TimeSlot;
use App\Models\Country;
use App\Models\Addresse;
use App\Models\MobileApp;
use App\Models\SectionTitel;
use App\Models\Cart;
use App\Models\CartAddons;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\ApplyCoupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\RazorpayPayment;
use App\Models\PaystackAndMollie;
use App\Models\Flutterwave;
use App\Models\StripePayment;
use App\Models\Shipping;
use App\Models\BankPayment;
use App\Models\PaypalPayment;
use App\Models\Admin;
use App\Models\DeleveryArea;
use App\Models\InstamojoPayment;
use App\Models\ContactPage as ContactUs;
use App\Models\PayCash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Validator;

class CheckoutController extends Controller
{
    public function delivery(Request $request)
    {
        if (Auth::user()) {
            $data['DeleveryAreas'] = DeleveryArea::all();
            $data['seo_setting'] =  SeoSetting::where('id', 12)->first();
            $data['setting'] =  Setting::first();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            $data['slots'] = TimeSlot::orderBy('id', 'asc')->get();
            $data['branchs'] = Admin::where('status', 1)->orderBy('id', 'asc')->get();
            $data['countries'] = Country::all();
            $data['address'] = Addresse::with('GetCountry', 'GetState', 'GetCity')->where('user_id', Auth::user()->id)->get();
            $data['cart'] = $request->session()->get('cart', []);
            $data['vatCharge'] = $data['setting']->vat_rate;
            $data['deleveryCharge'] = 0;
            $check = ApplyCoupon::with('coupon')->where(['user_id' => auth::user()->id])->first();
            if ($check) {
                if ($check->coupon->offer_type == '%') {
                    $data['discount'] = ($check->coupon->discount / 100);
                } else {
                    $data['discount'] = $check->coupon->discount;
                }
            } else {
                $data['discount'] = 0;
            }
            // return view('Frontend.Pages.checkout',$data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function pickUp(Request $request)
    {

        
        if (Auth::user()) {
            
            if(count($request->session()->get('cart', [])) == 0){
                return redirect()->route('index');
            }
            $data['seo_setting'] =  SeoSetting::where('id', 12)->first();
            $data['setting'] =  Setting::first();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            $data['slots'] = TimeSlot::orderBy('id', 'asc')->where('status', '=' ,'active')->get();
            $data['contact'] = ContactUs::first();
            $data['branchs'] = Admin::where('status', 1)->orderBy('id', 'asc')->get();
            $data['cart'] = $request->session()->get('cart', []);
            $data['deleveryCharge'] = 0;
            $data['vatCharge'] = $data['setting']->vat_rate;
            if (auth::user()) {
                $check = ApplyCoupon::with('coupon')->where(['user_id' => auth::user()->id])->first();
                $data['cart_data'] =  Cart::where('user_id', auth::user()->id)->first();
                $data['cart_data'] =  Cart::where('user_id', auth::user()->id)->first();
            } else {
                $check = ApplyCoupon::with('coupon')->first();
                $data['cart_data'] =  Cart::first();
                $data['cart_data'] =  null;
            }
            if ($check) {
                if ($check->coupon->offer_type == '%') {
                    $data['discount'] = ($check->coupon->discount / 100);
                } else {
                    $data['discount'] = $check->coupon->discount;
                }
            } else {
                $data['discount'] = 0;
            }

            $data['cash_payment'] = PayCash::first();
            // $data['razorpay'] = RazorpayPayment::first();
            $data['paypal_payment'] = PaypalPayment::first();
            // $data['paystack'] = PaystackAndMollie::first();
            // $data['flutterwave'] = Flutterwave::first();
            $data['stripe'] = StripePayment::first();
            // $data['bankPayment']  = BankPayment::first();
            $data['instamojo'] = InstamojoPayment::first();

            $data['seo_setting'] =  SeoSetting::where('id', 12)->first();
            $data['setting'] =  Setting::first();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            $data['cart'] = $request->session()->get('cart', []);


            // $data['order_total'] =  $cart->grand_total;
            $data['contactus'] = ContactUs::with('translate_contactus')->first();
            return view('Frontend.Pages.pickup', $data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function inResturent(Request $request)
    {
        if (Auth::user()) {
            $data['seo_setting'] =  SeoSetting::where('id', 12)->first();
            $data['setting'] =  Setting::first();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            $data['slots'] = TimeSlot::orderBy('id', 'asc')->get();
            $data['contact'] = ContactUs::first();
            $data['branchs'] = Admin::where('status', 1)->orderBy('id', 'asc')->get();
            $data['cart'] = $request->session()->get('cart', []);
            $data['deleveryCharge'] = 0;
            $check = ApplyCoupon::with('coupon')->where(['user_id' => auth::user()->id])->first();
            $data['vatCharge'] = $data['setting']->vat_rate;
            if ($check) {
                if ($check->coupon->offer_type == '%') {
                    $data['discount'] = ($check->coupon->discount / 100);
                } else {
                    $data['discount'] = $check->coupon->discount;
                }
            } else {
                $data['discount'] = 0;
            }

            $data['cart_data'] =  Cart::where('user_id', auth::user()->id)->first();

            return view('Frontend.Pages.inrestaurant', $data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function applyCoupon(Request $request)
    {

        $data['coupon'] = Coupon::where(['code' => $request->coupon, 'status' => 'active'])->first();

        if (!$data['coupon']) {
            $notification = trans('translate.Your provided coupon is invalid');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if ($data['coupon']->expired_date < date('Y-m-d')) {
            $notification = trans('translate.Your provided coupon has expired');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if ($data['coupon']->apply_qty >=  $data['coupon']->max_quantity) {
            $notification = trans('translate.Your provided coupon limit is exceeded');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if ($data['coupon']->offer_type == '%') {
            $discountAmount = $request->subtotal * ($data['coupon']->discount / 100);
            $discountTotal = $request->subtotal - $discountAmount;
        } else {
            $discountTotal = $request->subtotal - $data['coupon']->discount;
            $discountAmount = $data['coupon']->discount;
        }
        $notification = trans('translate.Coupon applied successful');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return response()->json(['$discountTotal' => $discountTotal, 'discountAmount' => $discountAmount]);
        // return redirect()->back()->with($notification);
    }



    public function processOrder(Request $request)
    {

        $req_type = $request->type;
        if (Auth::user()) {

            $rules = [
                'delevery_day' => 'required',
                'delevery_time' => 'required',
                'branch' => 'required',
            ];
            $customMessages = [
                'delevery_day.required' => trans('translate.Delivery day is required'),
                'delevery_time.required' => trans('translate.Delivery time is required'),
                'branch.required' => trans('translate.Branch is required'),
            ];
            $this->validate($request, $rules, $customMessages);

            if ($request->type == 'delivery') {
                if ($request->address_id == '') {
                    $message = 'Address is required';
                    $notification = array('message' => $message, 'alert-type' => 'error');
                    return redirect()->back()->with($notification);
                }
                $findAddress = Addresse::where('id', $request->address_id)->first();
                if ($findAddress) {
                    $shipping = DeleveryArea::where('id', $findAddress->area_id)->first();
                    if ($shipping) {
                        $delevery_charge = $shipping->fee;
                    } else {
                        $delevery_charge = 0;
                    }
                } else {
                    $delevery_charge = 0;
                }
            } else {
                $delevery_charge = 0;
            }
            $check = Cart::where(['user_id' => auth::user()->id])->first();
            if ($check) {
                $cart = Cart::find($check->id);
                $cart->user_id = auth::user()->id;
                $cart->type = $req_type;
                $cart->number_of_gest = $request->number_of_gest;
                $cart->address_id = $request->address_id;
                $cart->delevery_day = $request->delevery_day;
                $cart->delevery_time_id = $request->delevery_time;
                $cart->discount_amount = $request->discount_amount;
                $cart->delevery_charge = $delevery_charge;
                $cart->vat_charge = $request->vat_charge;
                $cart->total = $request->total;
                $cart->grand_total = $request->grand_total + $delevery_charge;
                $cart->save();
            } else {
                $cart = new Cart();
                $cart->user_id = auth::user()->id;
                $cart->type = $req_type;
                $cart->number_of_gest = $request->number_of_gest;
                $cart->address_id = $request->address_id;
                $cart->delevery_day = $request->delevery_day;
                $cart->delevery_time_id = $request->delevery_time;
                $cart->discount_amount = $request->discount_amount;
                $cart->delevery_charge = $delevery_charge;
                $cart->vat_charge = $request->vat_charge;
                $cart->total = $request->total;
                $cart->grand_total = $request->grand_total + $delevery_charge;
                $cart->save();
            }

            return redirect()->route('select.payment.method');
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function selectPayment(Request $request)
    {
        $data['cash_payment'] = PayCash::first();
        $data['razorpay'] = RazorpayPayment::first();
        $data['paypal_payment'] = PaypalPayment::first();
        $data['paystack'] = PaystackAndMollie::first();
        $data['flutterwave'] = Flutterwave::first();
        $data['stripe'] = StripePayment::first();
        $data['bankPayment']  = BankPayment::first();
        $data['instamojo'] = InstamojoPayment::first();

        $data['seo_setting'] =  SeoSetting::where('id', 12)->first();
        $data['setting'] =  Setting::first();
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['cart_data'] =  Cart::where('user_id', auth::user()->id)->first();
        $data['cart'] = $request->session()->get('cart', []);
        $cart =  Cart::where('user_id', Auth::user()->id)->first();
        $data['order_total'] =  $cart->grand_total;

        return view('Frontend.Pages.select_payment', $data);
    }

    public function checkOut(Request $request)
    {
        // if (Auth::user()) {
        $rules = [
            'delevery_time' => 'required|int',
            'delevery_day' => 'required',
            // 'branch' => 'required',
        ];
        $customMessages = [
            'delevery_day.required' => trans('translate.Delivery day is required'),
            'delevery_time.required' => trans('translate.Delivery time is required'),
            // 'branch.required' => trans('translate.Branch is required'),
        ];
        $this->validate($request, $rules, $customMessages);
        if(!Auth::user()){
            $check_user = User::where('email', $request->email)->first();
            if($check_user){
                $user_id = $check_user->id;
            }else {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->phone = $request->phone;
                $newUser->email = $request->email;
                $newUser->password = Hash::make('Password');
                $newUser->save();
                $user_id = $newUser->id;
            }
        } else {
            $user_id = Auth::user()->id;
        }
        $delevery_charge = 0;
        $req_type = $request->type;

        $cartData = $request->session()->get('cart', []);
        if($request->payment_method == 'pay_with_cash'){
            $payment_method = "CashOnDelivery";
            $payment_status = "Pending";
        } else {
            $payment_method = "Stripe";
            $payment_status = "Paid";
        }

        $order = new Order();
        $order->user_id = $user_id;
        $order->type = 'pickup';
        $order->number_of_gest = 1;
        $order->address_id = 1;
        $order->delevery_day = $request->delevery_day;
        $order->delevery_time_id = $request->delevery_time;
        $order->note = $request->note;
        $order->discount_amount = $request->discount_amount;
        $order->delevery_charge = $request->delevery_charge;
        $order->vat_charge = 0;
        $order->total = $request->total;
        $order->grand_total = $request->grand_total;
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
        // } else {
        //     $message = trans('translate.Please login first');
        //     $notification = array('message' => $message, 'alert-type' => 'error');
        //     return redirect()->route('login')->with($notification);
        // }

    }
    public function orderDetail(Request $request){
        try {
            $orderId = Crypt::decrypt($request->query('order'));
            $order = Order::find($orderId);
            $orderItems =  OrderItem::where('order_id', $orderId)->get();
            return view('Frontend.Pages.order_detail', ['order' => $order, 'orderItems' => $orderItems]);
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Invalid order.');
        }
    }
}
