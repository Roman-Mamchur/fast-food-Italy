<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::orderBy('id','desc')->get();

        return view('Admin.pages.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('Admin.pages.coupon.create');
    }

    public function store(Request $request){
        $rules = [
            'name'=>'required',
            'code'=>'required|unique:coupons',
            'number_of_time'=>'required|numeric',
            'min_purchase_price'=>'required|numeric',
            'offer_type'=>'required',
            'discount'=>'required|numeric',
            'status'=>'required',
            'expired_date'=>'required',
            'status'=>'required',
        ];
        $customMessages = [
            'code.required' => "Code is required",
            'code.unique' => "Code already exist",
            'name.required' => "Name is required",
            'number_of_time.required' => "Number of time is required",
            'offer_type.required' => "Offer type is required",
            'discount.required' => "Discount is required",
            'status.required' => "Status is required",
            'expired_date.required' => "Expired date is required",
            'min_purchase_price.required' => "Minimum price is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->max_quantity = $request->number_of_time;
        $coupon->min_purchase_price = $request->min_purchase_price;
        $coupon->expired_date = $request->expired_date;
        $coupon->offer_type = $request->offer_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        $messase = "Created Successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->route('coupon.index')->with($notification);

    }
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('Admin.pages.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, $id){
        $rules = [
            'name'=>'required',
            'code'=>'required|unique:coupons,code,'.$id,
            'number_of_time'=>'required|numeric',
            'min_purchase_price'=>'required|numeric',
            'offer_type'=>'required',
            'discount'=>'required|numeric',
            'status'=>'required',
            'expired_date'=>'required',
            'status'=>'required',
        ];
        $customMessages = [
            'code.required' => "Code is required",
            'code.unique' => "Code already exist",
            'name.required' => "Name is required",
            'number_of_time.required' => "Number of time is required",
            'offer_type.required' => "Offer type is required",
            'discount.required' => "Discount is required",
            'status.required' => "Status is required",
            'expired_date.required' => "Expired date is required",
            'min_purchase_price.required' => "Minimum price is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $coupon = Coupon::find($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->max_quantity = $request->number_of_time;
        $coupon->min_purchase_price = $request->min_purchase_price;
        $coupon->offer_type = $request->offer_type;
        $coupon->discount = $request->discount;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        $messase = "Update Successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->route('coupon.index')->with($notification);
    }

    public function delete($id)
    {
       try{
        $Coupon = Coupon::find($id);
        $delete_Coupon = $Coupon->delete();
        $message = "Coupon deleted successfully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
       }catch(\Exception $e)
       {
            $message = $e->getMessage();
            $notification = array('message' => $message,'alert-type' => 'error');
            return redirect()->back()->with($notification);
       }
    }

    public function ChangeStatus($id)
    {
        $update_status = 'active';
        $subcategory = Coupon::find($id);
        if($subcategory->status == 'active')
        {
            $update_status = 'inactive';
        }else{
            $update_status = 'active';
        }
        $subcategory->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Statuss Updated',
        ]);   
    }
}
