<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogCategoryTranslate;
use App\Models\Language;
use Validator;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blog_categories = BlogCategory::with('category_translate')->paginate(20);
        return view('Admin.pages.blog_category.index',compact('blog_categories'));
    }
    public function create()
    {
        return view('Admin.pages.blog_category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:blog_categories',
            'status' => 'required|string',
        ]);
        $blog_category = new BlogCategory();
        $blog_category->slug = $request->slug;
        $blog_category->status = $request->status;
        $blog_category->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new BlogCategoryTranslate();
          $translate->blog_category_id = $blog_category->id;
          $translate->lang_code = $language->lang_code;
          $translate->name = $request->name;
          $translate->save();
        }

        $message = "Insert Successfully !!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->route('blog-category.edit',$blog_category->id)->with($notification);
    }

    public function edit($id)
    {
        $blog_category =  BlogCategory::with('category_translate')->find($id);
        return view('Admin.pages.blog_category.edit',compact('blog_category'));
    }
    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:blog_categories,slug,'.$id,
            'status' => 'required|string',
        ]);
        $blog_category = BlogCategory::find($id);
        $blog_category->slug = $request->slug;
        $blog_category->status = $request->status;
        $blog_category->save();

        $translate = BlogCategoryTranslate::where('blog_category_id',$id)->where('lang_code','en')->first();
        $translate->blog_category_id = $translate->blog_category_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();

        $message = "Update Successfully !!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->route('blog-category.edit',$blog_category->id)->with($notification);
    }
    public function delete($id)
    {
        try{
            $blog_category = BlogCategory::find($id);
            $blog_category->delete();
            BlogCategoryTranslate::where('blog_category_id',$id)->delete();

            $message = "Deleted Successfully!!";
            $notification = array('message'=> $message,'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }catch(Exception $e){

            $message = $e->getMessage();
            $notification = array('message'=> $message,'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
    public function editLanguage($blogCategoryId,$langCode)
    {
        $blog_category =  BlogCategory::with('category_translate')->find($blogCategoryId);
        $translate_category =  BlogCategoryTranslate::where('blog_category_id',$blogCategoryId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.blog_category.edit',compact('translate_category','blog_category','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $tr = BlogCategoryTranslate::find($id);
        $tr->update([
            'name' => $request->name
        ]);
        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function UpdateStatus($id)
    {
        $update_status = 'active';
        $blog_category = BlogCategory::find($id);
        if($blog_category->status == 'active')
        {
            $update_status = 'inactive';

        }else{
            $update_status = 'active';
        }
        $blog_category->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Status updated',
        ]);

    }
}
