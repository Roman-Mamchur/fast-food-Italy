<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use App\Models\EmailTemplate;
use App\Models\User;
use App\Mail\OrderConfirmedMail;
use App\Helpers\MailHelper;
use App\Mail\OrderDecline;
use App\Models\Reservation;
use Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use Mail;

class OrderController extends Controller
{
    public function allOrder()
    {
        $setting = Setting::first();
        $order = Order::with('userName')->orderBy('id', 'DESC')->get();

        return view('Admin.pages.order.all_order', compact('order', 'setting'));
    }

    public function preOrder()
    {
        $setting = Setting::first();
        $order = Reservation::orderBy('id', 'DESC')->get();

        return view('Admin.pages.order.pre_order', compact('order', 'setting'));
    }

    public function deliveryOrder()
    {
        $data['setting'] = Setting::first();
        $data['order'] = Order::with('userName')->orderBy('id', 'DESC')->where('type', 'delivery')->paginate(10);
        return view('Admin.pages.order.delivery_order', $data);
    }

    public function pickupOrder()
    {
        $data['setting'] = Setting::first();
        $data['order'] = Order::with('userName')->orderBy('id', 'DESC')->where('type', 'pickup')->paginate(10);
        return view('Admin.pages.order.pickup_order', $data);
    }

    public function inresturentOrder()
    {
        $data['setting'] = Setting::first();
        $data['order'] = Order::with('userName')->orderBy('id', 'DESC')->where('type', 'inresturent')->paginate(10);
        return view('Admin.pages.order.inresturent_order', $data);
    }

    public function OrderDetils($id)
    {
        $data['setting'] = Setting::first();
        $data['order'] = Order::find($id);
        $data['OrderItem'] = OrderItem::where('order_id', $id)->get();
        return view('Admin.pages.order.order_detils', $data);
    }

    public function OrderDelete($id)
    {
        try {
            OrderItem::where('order_id', $id)->delete();
            Order::where('id', $id)->delete();

            $message = "Delete successfully";
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function OrderChange(Request $request, $id)
    {
        $order = Order::find($id);
        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;

        if ($order->save()) {
            MailHelper::setMailConfig();
            $setting = Setting::first();
            $template = EmailTemplate::where('id', 7)->first();
            $subject = $template->subject;
            $message = $template->description;
            if ($order->order_status == 1) {
                $orderStatus = 'Pending';
            }
            if ($order->order_status == 3) {
                $orderStatus = 'Confirmed';
            } else {
                $orderStatus = 'Success';
            }
            $message = str_replace('{{user_name}}', $order->userName->name, $message);
            $message = str_replace('{{order_status}}', $orderStatus, $message);
            $message = str_replace('{{payment_status}}', $order->payment_status, $message);
            $message = str_replace('{{delevery_day}}', $order->delevery_day, $message);
            $message = str_replace('{{delevery_time_id}}', $order->TimeSlt->slot, $message);
            $message = str_replace('{{number_of_gest}}', $order->number_of_gest, $message);
            $message = str_replace('{{type}}', $order->type, $message);
            Mail::to($order->userName->email)->send(new OrderConfirmedMail($message, $subject));
        }
        $message = "successfully Changed";
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        $data['setting'] = Setting::first();
        $data['order'] = Order::find($id);
        $data['OrderItem'] = OrderItem::where('order_id', $id)->get();
        if (request()->is('print*')) {
            // If it's a print request, load the print view
            return view('Admin.pages.order.print_invoice', $data);
        }
        return view('Admin.pages.order.invoice', $data);
    }


    public function orderManagement()
    {
        $setting = Setting::first();
        $admin_id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($admin_id);
        return view('Admin.pages.order.order_management', compact('setting', 'admin'));
    }



    public function countNewOrders()
    {
        $newOrders = Order::where('order_status', 0)->whereDate('created_at', Carbon::today())->get();
        return response()->json(['status' => true, 'orders' => $newOrders->count()]);
    }



    public function newOrders(Request $request)
    {
        $setting = Setting::first();
    
        // Fetch orders based on order type and date
        if ($request->order_type == 'new') {
            $orders = Order::orderBy('id', 'DESC')
                // ->whereDate('created_at', $request->get_date)
                ->where('order_status', 0)  // Pending orders
                ->get();
            $ordersall = 0;
        } elseif ($request->order_type == 'accepted') {
            $orders = Order::orderBy('id', 'DESC')
                ->where('order_status', 1)
                ->whereDate('created_at', $request->get_date)
                ->get();
            $ordersall = 0;
        } elseif ($request->order_type == 'canceled') {
            $orders = Order::orderBy('id', 'DESC')
                ->where('order_status', 4)
                ->whereDate('created_at', $request->get_date)
                ->get();
            $ordersall = 0;
        } else {
            $orders = Order::orderBy('id', 'DESC')
                ->whereDate('created_at', $request->get_date)
                ->get();
            $ordersall = 1;
        }
    
        // Render the HTML for the orders table
        $render = view('Admin.pages.order._partials.new-orders', compact('orders', 'ordersall'))->render();
    
        return response()->json([
            'html' => $render,
            'ordersall' => $ordersall
        ]);
    }
    public function oldOrders(Request $request)
    {
        $setting = Setting::first();
        $ordersall = 1;
        $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->get();

        $rendor = view('Admin.pages.order._partials.new-orders', compact('orders', 'ordersall'))->render();
        return response()->json(['html' => $rendor, 'ordersall' => $ordersall], 200);
    }

    public function orderInvoice(Request $request)
    {
        $setting = Setting::first();
        $order = Order::find($request->order_id);

        $user = User::find($order->user_id);


        $rendor = view('Admin.pages.order._partials.invoice', compact('order', 'user'))->render();
        return response()->json(['html' => $rendor], 200);
    }


    public function declineOrder(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::find($request->order_id);
        $order->order_status = 4;
        $user = AuthUser::find($order->user_id);
        if ($user) {
            $OrderItem = OrderItem::where('order_id', $order->id)->get();
            $subject = 'Order has been declined';
            $orderDecline = new OrderDecline($order, $OrderItem, $subject, $user->name);
            Mail::to($user->email)->send($orderDecline);
        }
        $order->save();
         
        if($request->currentPage == 'canceled'){
            $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 4)->get();
            $ordersall = 0;
        } else if($request->currentPage == 'accepted'){
            $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 1)->get();
            $ordersall = 0;
        } else if($request->currentPage == 'new'){
            $orders = Order::orderBy('id', 'DESC')
            // ->whereDate('created_at', $request->get_date)
            ->where('order_status', 0)->get();
            $ordersall = 0;
        } else {
            $ordersall = 0;
            $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 1)->get();
        }
        $rendor1 = view('Admin.pages.order._partials.new-orders', compact('orders', 'ordersall'))->render();
        return response()->json(['message' => 'Order has been declined', 'html1' => $rendor1], 200);
    }


    public function acceptOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->order_status = 1;
        $order->save();
        $user = User::find($order->user_id);
        $render = view('Admin.pages.order._partials.invoice', compact('order', 'user'))->render();
        $ordersall = 0;
        $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 0)->get();
        $rendor1 = view('Admin.pages.order._partials.new-orders', compact('orders', 'ordersall'))->render();
        return response()->json([
            'message' => 'Order has been accepted',
            'html' => $render,
            'html1' => $rendor1
        ], 200);
    }



    public function orderReports(Request $request)
    {
        $setting = Setting::first();
        if ($request->report_type == 'x-report') {
            $cashOrders = Order::select('id', 'total', 'order_status', 'payment_method')->where('payment_method', 'CashOnDelivery')->whereDate('created_at', $request->get_date)->where('order_status', '!=', 4)->get();
            $creditOrders = Order::select('id', 'total', 'order_status', 'payment_method')->where('payment_method', '!=', 'CashOnDelivery')->whereDate('created_at', $request->get_date)->where('order_status', '!=', 4)->get();
            $reportType = "X Report";
            $date = $request->get_date;
        } else if ($request->report_type == 'custom-report') {
            $startDate = $request->start_date; // 2024-02-01
            $formattedStartDate = Carbon::parse($startDate)->format('d-m-Y');
            $endDate = $request->end_date;   // 2024-02-10
            $formattedEndDate = Carbon::parse($endDate)->format('d-m-Y');

            $date = $formattedStartDate .' to '. $formattedEndDate;

            $cashOrders = Order::select('id','total','order_status', 'payment_method')->where('payment_method' , 'CashOnDelivery')->whereBetween('created_at', [$startDate, $endDate])->where('order_status', '!=',4)->get();
            $creditOrders = Order::select('id','total','order_status', 'payment_method')->where('payment_method' , '!=', 'CashOnDelivery')->whereBetween('created_at', [$startDate, $endDate])->where('order_status', '!=',4)->get();
            $reportType = "Custom Report";
        } else {
            $reportType = "Z Report";
            $cashOrders = Order::select('id', 'total', 'order_status', 'payment_method')->where('payment_method', 'CashOnDelivery')->whereDate('created_at',  Carbon::today())->where('order_status', '!=',4)->get();
            $creditOrders = Order::select('id', 'total', 'order_status', 'payment_method')->where('payment_method', '!=', 'CashOnDelivery')->whereDate('created_at', Carbon::today())->where('order_status', '!=',4)->get();

            $date = date('Y-m-d', strtotime(Carbon::today()));
        }

        $rendor = view('Admin.pages.order._partials.reports', compact('cashOrders', 'creditOrders', 'date', 'reportType'))->render();
        return response()->json(['html' => $rendor], 200);
    }

    public function orderDestroy(Request $request)
    {
        try {
            OrderItem::where('order_id', $request->order_id)->delete();
            Order::where('id', $request->order_id)->delete();
            $ordersall = 1;
            // if($request->currentPage == 'canceled'){
            //     $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 4)->get();
            //     $ordersall = 0;
            // } else if($request->currentPage == 'accepted'){
            //     $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 1)->get();
            //     $ordersall = 0;
            // } else if($request->currentPage == 'new'){
            //     $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('order_status', 0)->get();
            //     $ordersall = 0;
            // } else {
            //     $ordersall = 0;
            // }
            $orders = Order::orderBy('id', 'DESC')->whereDate('created_at', $request->get_date)->where('id', '!=', $request->order_id)->get();
            $rendor1 = view('Admin.pages.order._partials.new-orders', compact('orders', 'ordersall'))->render();

            $message = "Delete successfully";
            return response()->json(['status' => true, 'message' => $message, 'html1' => $rendor1], 200);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return response()->json(['status' => false, 'message' => $message], 200);
        }
    }
}
