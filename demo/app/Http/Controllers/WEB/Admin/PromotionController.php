<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Validator;
use Image;
use Str;
use File;

class PromotionController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id','DESC')->paginate(8);
        return view('Admin.pages.promotion.index',compact('partners'));
    }

    public function create()
    {
        return view('Admin.pages.promotion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'link' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       if($request->image){
        $extention = $request->image->getClientOriginalExtension();
        $image_name = Str::slug('pertner-image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
        $image_name = 'uploads/custom-images/'.$image_name;
        Image::make($request->image)
            ->save(public_path().'/'.$image_name);
        };
       $partner = new Partner();
       $partner->link = $request->link;
       $partner->image = $image_name;
       $partner->save();

       $message = "Created Successfully";
       $notification = array('message'=> $message,'alert-type'=> 'success');
       return redirect()->route('promotion.index')->with($notification);
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        $existing_image = $partner->image;
        $partner->delete();
        if($existing_image){
            if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
        }

        $message = "Delete Successfully";
       $notification = array('message'=> $message,'alert-type'=> 'success');
       return redirect()->back()->with($notification);
    }
}
