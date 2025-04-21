<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeleveryArea;
use App\Models\Setting;
use Validator;

class DeliveryAreaController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $delivery_areas = DeleveryArea::orderBy('id','DESC')->paginate(8);
        return view('Admin.pages.delivery_area.index',compact('delivery_areas','setting'));
    }
    public function create()
    {
        return view('Admin.pages.delivery_area.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'area_name' => 'required|string',
            'max_time' => 'required',
            'min_time' => 'required',
            'fee' => 'required',
            'status'  => 'required|string',
        ]);
        $delivery_area = new DeleveryArea();
        $delivery_area->area_name = $request->area_name;
        $delivery_area->max_time = $request->max_time;
        $delivery_area->min_time = $request->min_time;
        $delivery_area->fee = $request->fee;
        $delivery_area->status = $request->status;
        $delivery_area->save();

        $message = "Insert Successfully!";
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->route('deliveryarea.edit',$delivery_area->id)->with($notification);
    }
    public function show($id)
    {
        $delevery_area = DeleveryArea::where('id',$id)->get();
        return response()->json(array(
            'success' =>200,
            'delevery_area'   =>$delevery_area
        ));
    }
    public function edit($id)
    {
        $delivery_area = DeleveryArea::find($id);
        return view('Admin.pages.delivery_area.edit',compact('delivery_area'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'area_name' => 'required|string',
            'max_time' => 'required',
            'min_time' => 'required',
            'fee' => 'required',
            'status'  => 'required|string',
        ]);
        $delivery_area = DeleveryArea::find($id);
        $delivery_area->area_name = $request->area_name;
        $delivery_area->max_time = $request->max_time;
        $delivery_area->min_time = $request->min_time;
        $delivery_area->fee = $request->fee;
        $delivery_area->status = $request->status;
        $delivery_area->save();

        $message = "Updated Successfully!!";
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
       try{
            $delevery_area = DeleveryArea::find($id);
            $delevery_area->delete();

            $message = "Delete City Successfully!!";
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);

       }catch(Exception $e)
       {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
       }
    }

    public function ChangeStatus($id)
    {
        try{
        $update_status = '1';
        $city = DeleveryArea::find($id);
        if($city->status == '1')
        {
            $update_status = '0';

        }else{
            $update_status = '1';
        }
        $city->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'update successfully'
        ]);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}
