<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\City;

class ShippingController extends Controller
{
    public function index(){
        $shippings = Shipping::with('city.state.country')->orderBy('id','asc')->get();
        return view('Admin.pages.shipping.index', compact('shippings'));
    }

    public function create(){
        $cities = City::with('translate_city','state','country')->where('status','active')->orderBy('id','asc')->get();
        return view('Admin.pages.shipping.create', compact('cities'));
    }

    public function store(Request $request){
        $rules = [
            'city_id' => 'required',
            'shipping_rule' => 'required',
            'shipping_fee' => 'required|numeric',
            'condition_from' => 'required|numeric',
            'condition_to' => 'required|numeric',
        ];
        $customMessages = [
            'city_id.required' => "City is required",
            'shipping_rule.required' => "Shipping rule is required",
            'shipping_fee.required' => "Shipping fee is required",
            'condition_from.required' => "Condition from is required",
            'condition_to.required' => "Condition to is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $shipping = new Shipping();
        $shipping->city_id = $request->city_id;
        $shipping->shipping_rule = $request->shipping_rule;
        $shipping->shipping_fee = $request->shipping_fee;
        $shipping->condition_from = $request->condition_from;
        $shipping->condition_to = $request->condition_to;
        $shipping->save();

        $notification="Created Successfully";
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('shipping.index')->with($notification);
    }


    public function edit($id){
        $cities = City::with('translate_city','state','country')->where('status','active')->orderBy('id','asc')->get();
        $shipping = Shipping::find($id);
        return view('Admin.pages.shipping.edit', compact('shipping','cities'));
    }

    public function update(Request $request, $id){

        $rules = [
            'city_id' => 'required',
            'shipping_rule' => 'required',
            'shipping_fee' => 'required|numeric',
            'condition_from' => 'required|numeric',
            'condition_to' => 'required|numeric',
        ];
        $customMessages = [
            'city_id.required' => "City is required",
            'shipping_rule.required' => "Shipping rule is required",
            'shipping_fee.required' => "Shipping fee is required",
            'condition_from.required' => "Condition from is required",
            'condition_to.required' => "Condition to is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $shipping = Shipping::find($id);
        $shipping->city_id = $request->city_id;
        $shipping->shipping_rule = $request->shipping_rule;
        $shipping->shipping_fee = $request->shipping_fee;
        $shipping->condition_from = $request->condition_from;
        $shipping->condition_to = $request->condition_to;
        $shipping->save();

        $notification="Update Successfully";
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('shipping.index')->with($notification);

    }

    public function delete($id)
    {
        try{
            $Shipping = Shipping::find($id);
            $delete_Shipping = $Shipping->delete();
            $message = "Shipping deleted successfully";
            $notification = array('message' => $message,'alert-type' => 'success');
            return redirect()->back()->with($notification);
           }catch(\Exception $e)
           {
                $message = $e->getMessage();
                $notification = array('message' => $message,'alert-type' => 'error');
                return redirect()->back()->with($notification);
           }
    }

}
