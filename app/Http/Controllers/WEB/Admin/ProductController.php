<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TranslateProduct;
use App\Models\ProductGallery;
use App\Models\OptionalItem;
use App\Models\Category;
use App\Models\Language;
use App\Models\Wishlist;
use Validator;
use Image;
use Str;
use File;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::with('translate_category')->where('status','active')->get();
        $items = OptionalItem::with('translate_item')->where('status','active')->get();
        return view('Admin.pages.product.create',compact('categories','items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'tumb_image' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $product = new Product();
        if($request->tumb_image){
            $extention = $request->tumb_image->getClientOriginalExtension();
            $tumb_image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $tumb_image_name = 'uploads/custom-images/'.$tumb_image_name;
            Image::make($request->tumb_image)
                ->save(public_path().'/'.$tumb_image_name);
            $product->tumb_image = $tumb_image_name;
        }
        // if($request->vedio_tumb_image){
        //     $extention = $request->vedio_tumb_image->getClientOriginalExtension();
        //     $vedio_tumb_image = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
        //     $vedio_tumb_image = 'uploads/custom-images/'.$vedio_tumb_image;
        //     Image::make($request->vedio_tumb_image)
        //         ->save(public_path().'/'.$vedio_tumb_image);
        //     $product->vedio_tumb_image = $vedio_tumb_image;
        // }


        $product->slug = $request->slug;
        $product->vendor_id = 0;
        $product->position = $request->position;
        $product->category_id = $request->category_id;
        $product->price = $request->main_price;
        $product->offer_price = $request->offer_price;
        // $product->vedio_url = $request->vedio_url;
        $product->seo_titel = $request->seo_titel;
        $product->seo_description = $request->seo_description;
        $product->items = json_encode($request['items']);
        $product->is_populer = $request->is_populer;
        $product->status = $request->status;
        $product->special_instructions = $request->special_instructions;

        $product->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $extension = $image->getClientOriginalExtension();
                $image_name = 'Gallery' . date('Y-m-d-h-i-s') . rand(999, 9999) . '.' . $extension;
                $image_path = 'uploads/custom-images/' . $image_name;
                $image->move(public_path('uploads/custom-images'), $image_name);
                $gallery = new ProductGallery();
                $gallery->product_id = $product->id;
                $gallery->image = $image_path;
                $gallery->save();
            }
        }

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
            $translate = new TranslateProduct();
            $translate->product_id = $product->id;
            $translate->lang_code = $language->lang_code;
            $translate->name = $request->name;
            $translate->long_description = $request->long_description;
            // $translate->vedio_top_ber_description = $request->vedio_top_ber_description;
            // $translate->vedio_buttom_description = $request->vedio_buttom_description;
            $translate->size = json_encode(array_combine($request->size, $request->price));
            $translate->specifaction = json_encode($request['specifaction']);
            $translate->save();
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('product.list.show')->with($notification);

    }

    public function index()
    {
        $products = Product::with('translate_product')->paginate(10);
        return view('Admin.pages.product.index',compact('products'));
    }

    public function edit($id)
    {
        $categories = Category::with('translate_category')->where('status','active')->get();
        $items = OptionalItem::with('translate_item')->where('status','active')->get();
        $products = Product::with('translate_product')->find($id);
        $intArray = json_decode($products->items);
       if($intArray != null){
        $selectedIds = array_map('intval', $intArray);
       }else{
        $selectedIds = array();
       }

        return view('Admin.pages.product.edit',compact('products','categories','items','selectedIds'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
            'price' => 'required',
            // 'specifaction' => 'required',
            'status' => 'required',
        ]);
            $product = Product::find($id);
            $old_tumb_image = $product->tumb_image;
            // $old_vedio_tumb_image = $product->vedio_tumb_image;
            if($request->tumb_image){
                $extention = $request->tumb_image->getClientOriginalExtension();
                $tumb_image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $tumb_image_name = 'uploads/custom-images/'.$tumb_image_name;
                Image::make($request->tumb_image)
                    ->save(public_path().'/'.$tumb_image_name);
                if($old_tumb_image){
                    if(File::exists(public_path().'/'.$old_tumb_image))unlink(public_path().'/'.$old_tumb_image);
                }
                $product->tumb_image = $tumb_image_name;
            }
            // if($request->vedio_tumb_image){
            //     $extention = $request->vedio_tumb_image->getClientOriginalExtension();
            //     $vedio_tumb_image = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            //     $vedio_tumb_image = 'uploads/custom-images/'.$vedio_tumb_image;
            //     Image::make($request->vedio_tumb_image)
            //         ->save(public_path().'/'.$vedio_tumb_image);
            //         if($old_vedio_tumb_image){
            //             if(File::exists(public_path().'/'.$old_vedio_tumb_image))unlink(public_path().'/'.$old_vedio_tumb_image);
            //         }
            //     $product->vedio_tumb_image = $vedio_tumb_image;
            // }
            $product->slug = $request->slug;
            $product->vendor_id = 0;
            $product->position =$request->position;
            $product->category_id = $request->category_id;
            $product->price = $request->main_price;
            $product->offer_price = $request->offer_price;
            // $product->vedio_url = $request->vedio_url;
            $product->seo_titel = $request->seo_titel;
            $product->seo_description = $request->seo_description;
            $product->items = json_encode($request['items']);
            $product->is_populer = $request->is_populer;
            $product->status = $request->status;
            $product->special_instructions = $request->special_instructions;
            $product->save();

            $translate = TranslateProduct::where('product_id',$id)->where('lang_code','en')->first();
            $translate->name = $request->name;
            $translate->long_description = $request->long_description;
            // $translate->vedio_top_ber_description = $request->vedio_top_ber_description;
            // $translate->vedio_buttom_description = $request->vedio_buttom_description;
            $translate->size = json_encode(array_combine($request->size, $request->price));
            $translate->specifaction = json_encode($request['specifaction']);
            $translate->save();

            $message = "Update successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);
    }

    public function editLanguage($itemId,$langCode)
    {
        $products =  Product::with('translate_product')->find($itemId);
        $translate_product =  TranslateProduct::where('product_id',$itemId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.product.edit',compact('translate_product','products','selected_language'));
    }

    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $translate = TranslateProduct::find($id);
        $translate->product_id = $translate->product_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->long_description = $request->long_description;
        $translate->vedio_top_ber_description = $request->vedio_top_ber_description;
        $translate->vedio_buttom_description = $request->vedio_buttom_description;
        $translate->size = json_encode(array_combine($request->size, $request->price));
        $translate->specifaction = json_encode($request['specifaction']);
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        try{
            $item = Product::find($id);
            $update_status = 1;
            $item = Product::find($id);
            if($item->status == 'active')
            {
                $update_status = 'inactive';
            }else{
                $update_status = 'active';
            }
            $item_status = $item->update([
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

            $product = Product::findOrFail($id);
            $old_tumb_image = $product->tumb_image;
            $old_vedio_tumb_image = $product->vedio_tumb_image;
            $whishList = Wishlist::where('product_id', $product->id)->get();
            if($whishList){
                foreach($whishList as $w){
                    $w->delete();
                }
            }
            $delete = $product->delete();
            TranslateProduct::where('product_id',$id)->delete();
            ProductGallery::where('product_id',$id)->delete();
            if($old_tumb_image){
                if(File::exists(public_path().'/'.$old_tumb_image))unlink(public_path().'/'.$old_tumb_image);
            }
            if($old_vedio_tumb_image){
                if(File::exists(public_path().'/'.$old_vedio_tumb_image))unlink(public_path().'/'.$old_vedio_tumb_image);
            }
            $message = "Delete Product successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }

    public function GalleryView($id)
    {
        $gallery = ProductGallery::where('product_id',$id)->get();
        return view('Admin.pages.product.gallery',compact('gallery','id'));
    }

    public function GalleryStore(Request $request, $id)
    {

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $extension = $image->getClientOriginalExtension();
                $image_name = 'Gallery' . date('Y-m-d-h-i-s') . rand(999, 9999) . '.' . $extension;
                $image_path = 'uploads/custom-images/' . $image_name;
                $image->move(public_path('uploads/custom-images'), $image_name);
                $gallery = new ProductGallery();
                $gallery->product_id = $id;
                $gallery->image = $image_path;
                $gallery->save();
            }
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function GalleryDelete($id)
    {
        $data = ProductGallery::find($id);
        @unlink(($data->image));
        $data->delete();
        $message = "Deleted Successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
