<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use App\Models\Order;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['setting'] =  Setting::first();
        $data['totalUser'] =  User::count();
        $data['totalProduct'] =  Product::count();
        $data['totalOrder'] =  Order::count();
        $data['totalSales'] = Order::where('grand_total', '!=', null)->sum('grand_total');
        $data['order'] = Order::with('userName')->orderBy('id', 'desc')->paginate(10);
        return view('Admin.Dashboard',$data);
    }

}
