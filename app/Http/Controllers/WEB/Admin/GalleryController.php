<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Validator;
use Image;
use File;
use Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id','DESC')->paginate(10);
        return view('Admin.Gallery',compact('galleries'));
    }
    public function create()
    {
        return view('Admin.CreateGallery');
    }
    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->image){
        $extention = $request->image->getClientOriginalExtension();
        $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
        $image_name = 'uploads/custom-images/'.$image_name;
        Image::make($request->image)
            ->save(public_path().'/'.$image_name);
        };
        $gellery = new Gallery();
        $gellery->image = $image_name;
        $gellery->save();
        $message = "Created Successfully";
        $notification = array('message'=> $message,'alert-type'=> 'success');
        return redirect()->route('galleries.index')->with($notification);
    }


    public function delete($id)
    {
       $gallery = Gallery::find($id);
       $gallery->delete();
       $old_image = $gallery->image;
        if($old_image){
           if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }
       $message = "Delete Successfully";
       $notification = array('message'=> $message,'alert-type'=> 'success');
       return redirect()->route('galleries.index')->with($notification);
    }
}
