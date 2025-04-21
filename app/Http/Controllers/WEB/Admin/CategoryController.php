<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use App\Models\childcategory;
use App\Models\TranslateCategory;
use App\Models\Language;
use Validator;
use Image;
use Str;
use File;

class CategoryController extends Controller
{
    public function create()
    {
        return view('Admin.pages.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required',
            'image' => 'required'
        ]);

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        };

        $category = new Category();
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->position = $request->position;
        $category->image = $image_name;
        $category->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
            $translate = new TranslateCategory();
            $translate->category_id = $category->id;
            $translate->name = $request->name;
            $translate->lang_code = $language->lang_code;
            $translate->name = $request->name;
            $translate->save();
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('categories')->with($notification);


    }
    public function index()
    {
        $categories = Category::with('translate_category')->paginate(10);
        return view('Admin.pages.category.index',compact('categories'));
    }
    public function editCategory($id)
    {
        $category = Category::with('translate_category')->find($id);
        return view('Admin.pages.category.edit',compact('category'));
    }
    public function updateCategory(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug,'.$id,
            'status' => 'required'
        ]);

        $category = Category::find($id);
        $old_image = $category->image;
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        }else{
            $image_name = $old_image;
        }
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->position = $request->position;
        $category->image = $image_name;
        $category->save();

        $translate = TranslateCategory::where('category_id',$id)->where('lang_code','en')->first();
        $translate->name = $request->name;
        $translate->save();

        $message = "Updated successfully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editLanguage($categoryId,$langCode)
    {
        $category =  Category::with('translate_category')->find($categoryId);
        $translate_category =  TranslateCategory::where('category_id',$categoryId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.category.edit',compact('translate_category','category','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $tr = TranslateCategory::find($id);
        $tr->category_id = $tr->category_id;
        $tr->lang_code = $tr->lang_code;
        $tr->name = $request->name;
        $tr->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        try{
            $category = Category::find($id);
            $update_status = 1;
            $product = Category::find($id);
            if($product->status == 'active')
            {
                $update_status = 'inactive';
            }else{
                $update_status = 'active';
            }
            $product_status = $category->update([
                'status' => $update_status
            ]);
            return response()->json([
                'status' => '200',
                'message' => 'Status Updated',
            ]);
            }catch(\Exception $e)
            {
                return response()->json([
                    'status' => '200',
                    'message' => $e->getMessage(),
                ]);
            }
    }

    public function delete($id)
    {
        try{

            $category = Category::findOrFail($id);
            $old_image = $category->image;
            $delete = $category->delete();
            TranslateCategory::where('category_id',$id)->delete();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
            $message = "Delete Category successfully";
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
