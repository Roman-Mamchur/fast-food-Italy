<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    public function index(){
        $slots = TimeSlot::orderBy('id','asc')->get();
        return view('Admin.pages.timeslot.index', compact('slots'));
    }

    public function create(){
        return view('Admin.pages.timeslot.create');
    }

    public function store(Request $request){
        $rules = [
            'slot' => 'required',
        ];
        $customMessages = [
            'slot.required' => "Time Slot is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $timeSlot = new TimeSlot();
        $timeSlot->slot = $request->slot;
        $timeSlot->save();

        $notification="Created Successfully";
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('timeslot.index')->with($notification);
    }


    public function edit($id){
        $slot = TimeSlot::find($id);
        return view('Admin.pages.timeslot.edit', compact('slot'));
    }

    public function update(Request $request, $id){

        $rules = [
            'slot' => 'required',
        ];
        $customMessages = [
            'slot.required' => "Time Slot is required",
        ];
        $this->validate($request, $rules,$customMessages);

        $timeSlot = TimeSlot::find($id);
        $timeSlot->slot = $request->slot;
        $timeSlot->save();

        $notification="Update Successfully";
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('timeslot.index')->with($notification);

    }

    public function delete($id)
    {
        try{
            $timeslot = TimeSlot::find($id);
            $delete_timeslot = $timeslot->delete();
            $message = "Time Slot deleted successfully";
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
       try{
        $update_status = 'active';
        $timeSlot = TimeSlot::find($id);
        if($timeSlot->status == 'active')
        {
            $update_status = 'inactive';

        }else{
            $update_status = 'active';
        }
        $timeSlot->update([
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
