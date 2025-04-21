<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryTranslate;
use App\Models\BlogComment;
use App\Models\popular_post;
use App\Models\BlogTranslate;
use App\Models\Language;
use Validator;
use Image;
use File;
use Str;
use Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with('blog_translate')->orderBy('id','DESC')->paginate(8);
        return view('Admin.pages.blog.index',compact('blogs'));
    }
    public function create()
    {
        $blog_category = BlogCategory::with('category_translate')->where('status', 'active')->get();
        return view('Admin.pages.blog.create',compact('blog_category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:blogs,slug',
            'blog_category' => 'required',
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
            'status' => 'required',
            'image' => 'required|image',
            'description' => 'required|string',
            'tag' => 'required'
        ]);

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        };

        $blog = new Blog();
        $blog->admin_id = 1;
        $blog->slug = $request->slug;
        $blog->blog_category_id = $request->blog_category;
        $blog->image = $image_name;
        $blog->status = $request->status;
        $blog->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
        $translate = new BlogTranslate();
        $translate->blog_id = $blog->id;
        $translate->lang_code = $language->lang_code;
        $translate->title = $request->title;
        $translate->description = $request->description;
        $translate->seo_title = $request->seo_title;
        $translate->seo_description = $request->seo_description;
        $translate->tag = $request->tag;
        $translate->save();
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('blogs.edit',$blog->id)->with($notification);


    }
    public function edit($id)
    {
        $blog_category = BlogCategory::with('category_translate')->where('status','active')->select('id','status')->get();
        $blog = Blog::with('blog_translate','category.category_translate')->find($id);
        return view('Admin.pages.blog.edit',compact('blog','blog_category'));
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'title' => 'required|string',
                'slug' => 'required|string|unique:blogs,slug,'.$id,
                'blog_category' => 'required',
                'seo_title' => 'required|string',
                'seo_description' => 'required|string',
                'status' => 'required',
                'blog_description' => 'required|string'
            ]);
            $blog = Blog::find($id);
            $old_image = $blog->image;
            if($request->image){
                $extention = $request->image->getClientOriginalExtension();
                $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $image_name = 'uploads/custom-images/'.$image_name;
                Image::make($request->image)
                    ->save(public_path().'/'.$image_name);

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
            }else{
                $image_name = $old_image;
            }
            $blog->admin_id = 1;
            $blog->slug = $request->slug;
            $blog->blog_category_id = $request->blog_category;
            $blog->image = $image_name;
            $blog->status = $request->status;
            $blog->save();

            $translate = BlogTranslate::where('blog_id',$id)->where('lang_code','en')->first();
            $translate->blog_id = $blog->id;
            $translate->lang_code = $translate->lang_code;
            $translate->title = $request->title;
            $translate->description = $request->blog_description;
            $translate->seo_title = $request->seo_title;
            $translate->seo_description = $request->seo_description;
            $translate->tag = $request->tag;
            $translate->save();

            $message = "Update successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->route('blogs.edit',$blog->id)->with($notification);
    }
    public function delete($id)
    {
        try{

            $blog = Blog::findOrFail($id);
            $old_image = $blog->image;
            $delete = $blog->delete();
            BlogTranslate::where('blog_id',$id)->delete();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
            $message = "Delte blog successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }

    public function editLanguage($blogId,$langCode)
    {

        $blog =  Blog::with('blog_translate')->find($blogId);
        $translate_blog =  BlogTranslate::where('blog_id',$blogId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.blog.edit',compact('translate_blog','blog','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
            'blog_description' => 'required|string'
        ]);

        $translate = BlogTranslate::find($id);
        $translate->blog_id = $translate->blog_id;
        $translate->lang_code = $translate->lang_code;
        $translate->title = $request->title;
        $translate->description = $request->blog_description;
        $translate->seo_title = $request->seo_title;
        $translate->seo_description = $request->seo_description;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        $update_status = 'active';
        $blog = Blog::find($id);
        if($blog->status == 'active')
        {
            $update_status = 'inactive';
        }else{
            $update_status = 'active';
        }
        $blog->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Status Updated'
        ]);
    }

    public function blogComment()
    {
        $blogs = BlogComment::with('GetUser')->orderBy('id','DESC')->paginate(10);
        return view('Admin.pages.blog.comment',compact('blogs'));
    }

    public function changeBlogStatus($id)
    {
        $update_status = '1';
        $blog = BlogComment::find($id);
        if($blog->status == '1')
        {
            $update_status = '0';
        }else{
            $update_status = '1';
        }
        $blog->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Status Updated'
        ]);
    }

    public function blogDelete($id)
    {
        try{

            $blog = BlogComment::findOrFail($id);
            $delete = $blog->delete();
            $message = "Delete blog Comment successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }


}
