<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews =  Review::orderBy('id','DESC')->paginate(10);
        return view('Admin.Reviews',compact('reviews'));
    }

    public function deleteReviews($id)
    {
        $message = Review::find($id);
        $message->delete();

        $message = "Successfully Deleted!!";
        $notification = array('message' => $message,'alert' => 'success');
        return redirect()->back()->with($notification);
    }

    public function changeReviewStatus($id)
    {
        $update_status = '1';
        $review = Review::find($id);
        if($review->status == '1')
        {
            $update_status = '0';
        }else{
            $update_status = '1';
        }
        $review->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Status Updated'
        ]);
    }
}
