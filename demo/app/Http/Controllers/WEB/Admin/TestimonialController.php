<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Language;
use App\Models\TranslateTestimonial;
use Validator;
use Str;
use Image;
use File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials =  Testimonial::with('translate_testimonial')->orderBy('id','DESC')->paginate(8);
        return view('Admin.Testimonial',compact('testimonials'));
    }
    public function create()
    {
        return view('Admin.CreateTestimonials');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'comment' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);

        }
        $testimonial = new Testimonial();
        $testimonial->image = $image_name;
        $testimonial->status = $request->status;
        $testimonial->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new TranslateTestimonial();
          $translate->testimonial_id = $testimonial->id;
          $translate->lang_code      = $language->lang_code;
          $translate->name           = $request->name;
          $translate->designation    = $request->designation;
          $translate->comment        = $request->comment;
          $translate->save();
        }
        $message = "Create testimonial successfully";
        $notifiaction = array('message'=>$message,'alert-type' => 'success');
        return redirect()->route('testimonials.edit',$testimonial->id)->with($notifiaction);

    }
    public function edit($id)
    {
        $testimonials = Testimonial::with('translate_testimonial')->find($id);
        return view('Admin.EditTestimonial',compact('testimonials'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'comment' => 'required|string',
            'status' => 'required',
        ]);
        $testimonial = Testimonial::find($id);
        $old_image = $testimonial->image;

        if(!empty($request->image)){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug('name').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/Testimonial/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }
        else{
            $image_name = $old_image;
        }
        $testimonial = Testimonial::find($id);
        $testimonial->image = $image_name;
        $testimonial->status = $request->status;
        $testimonial->save();

        $translate = TranslateTestimonial::where('testimonial_id',$id)->where('lang_code','en')->first();
        $translate->testimonial_id = $translate->testimonial_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->designation = $request->designation;
        $translate->comment = $request->comment;
        $translate->save();

        $message = "Update successfully";
        $notifiaction = array('message'=>$message,'alert-type' => 'success');
        return redirect()->back()->with($notifiaction);

    }
    public function delete($id)
    {
        try{
            $testimonial = Testimonial::find($id);
            $delete = $testimonial->delete();
            TranslateTestimonial::where('testimonial_id',$id)->delete();

            $message = "Delete testimonial successfully";
            $notifiaction = array('message'=>$message,'alert-type' => 'success');
            return redirect()->back()->with($notifiaction);
        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notifiaction = array('message'=>$message,'alert-type' => 'error');
            return redirect()->back()->with($notifiaction);
        }
    }

    public function editLanguage($testimonialId,$langCode)
    {
        $testimonials = Testimonial::with('translate_testimonial')->find($testimonialId);
        $translate_testimonial =  TranslateTestimonial::where('testimonial_id',$testimonialId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditTestimonial',compact('translate_testimonial','testimonials','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'comment' => 'required|string',
           ]);
        $tr = TranslateTestimonial::find($id);
        $tr->testimonial_id = $tr->testimonial_id;
        $tr->lang_code = $tr->lang_code;
        $tr->name = $request->name;
        $tr->designation = $request->designation;
        $tr->comment = $request->comment;
        $tr->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function UpdateStatus($id)
    {
        try{
            $update_status = 'active';
            $testimonial = Testimonial::find($id);
            if($testimonial->status == 'active')
            {
                $update_status = 'inactive';

            }else{
                $update_status = 'active';
            }
            $testimonial_updated = $testimonial->update([
                'status' => $update_status
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Status Updated'
            ]);

            }catch(\Exception $e)
            {
                return response()->json([
                    'status' => 503,
                    'message' => $e->getMessage(),
                ]);
            }
    }
}
