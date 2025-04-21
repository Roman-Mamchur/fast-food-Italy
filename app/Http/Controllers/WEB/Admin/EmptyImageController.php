<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Image;
use Str;
use File;

class EmptyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting =  Setting::first();

        return view('Admin.EmptyImage',compact('setting'));
    }

    public function update(Request $request, $id)
    {
        try{
            $setting = Setting::find($id);
            $old_empty_cart_image = $setting->empty_cart;
            $old_error_page = $setting->error_page;

            if($request->empty_cart){
                $extention = $request->empty_cart->getClientOriginalExtension();
                $image_name = Str::slug('emptyCart').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $empty_cart = 'uploads/website-images/'.$image_name;
                Image::make($request->empty_cart)
                    ->save(public_path().'/'.$empty_cart);

                if($old_empty_cart_image){
                    if(File::exists(public_path().'/'.$old_empty_cart_image))unlink(public_path().'/'.$old_empty_cart_image);
                }

            }else{
               $empty_cart =  $old_empty_cart_image;
            }


            if($request->error_page){
                $extention = $request->error_page->getClientOriginalExtension();
                $image_name = Str::slug('error_page').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $error_page = 'uploads/website-images/'.$image_name;
                Image::make($request->error_page)
                    ->save(public_path().'/'.$error_page);

                if($old_error_page){
                    if(File::exists(public_path().'/'.$old_error_page))unlink(public_path().'/'.$old_error_page);
                }

            }else{
               $error_page =  $old_error_page;
            }

            $update = Setting::where('id',$id)->update([
                'empty_cart'=> $empty_cart,
                'error_page'=> $error_page,
            ]);
            if($update)
            {

                $messase = "Update successfully";
                $notification = array('message' => $messase,'alert-type'=> 'success');
                return redirect()->back()->with($notification);
            }

        }catch(\Exception $e)
        {
                $messase = $e->getMessage();
                $notification = array('message' => $messase,'alert-type'=> 'error');
                return redirect()->back()->with($notification);
        }
    }

    public function not_found_image(){
        $setting =  Setting::first();

        return view('Admin.not_found_image',compact('setting'));
    }

    public function update_not_found_image(Request $request){
        try{
            $setting = Setting::first();
            $old_empty_result = $setting->empty_result;
            $old_empty_wishlist = $setting->empty_wishlist;
            $old_error_image = $setting->error_image;

            if($request->empty_result){
                $extention = $request->empty_result->getClientOriginalExtension();
                $image_name = Str::slug('empty_result').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $empty_result = 'uploads/website-images/'.$image_name;
                Image::make($request->empty_result)
                    ->save(public_path().'/'.$empty_result);
                $setting->empty_result = $empty_result;
                $setting->save();

                if($old_empty_result){
                    if(File::exists(public_path().'/'.$old_empty_result))unlink(public_path().'/'.$old_empty_result);
                }

            }

            if($request->empty_wishlist){
                $extention = $request->empty_wishlist->getClientOriginalExtension();
                $image_name = Str::slug('empty_wishlist').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $empty_wishlist = 'uploads/website-images/'.$image_name;
                Image::make($request->empty_wishlist)
                    ->save(public_path().'/'.$empty_wishlist);
                $setting->empty_wishlist = $empty_wishlist;
                $setting->save();

                if($old_empty_wishlist){
                    if(File::exists(public_path().'/'.$old_empty_wishlist))unlink(public_path().'/'.$old_empty_wishlist);
                }

            }

            if($request->error_image){
                $extention = $request->error_image->getClientOriginalExtension();
                $image_name = Str::slug('error_image').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
                $error_image = 'uploads/website-images/'.$image_name;
                Image::make($request->error_image)
                    ->save(public_path().'/'.$error_image);
                $setting->error_image = $error_image;
                $setting->save();

                if($old_error_image){
                    if(File::exists(public_path().'/'.$old_error_image))unlink(public_path().'/'.$old_error_image);
                }

            }



            $messase = "Update successfully";
            $notification = array('message' => $messase,'alert-type'=> 'success');
            return redirect()->back()->with($notification);

        }catch(\Exception $e)
        {
                $messase = $e->getMessage();
                $notification = array('message' => $messase,'alert-type'=> 'error');
                return redirect()->back()->with($notification);
        }
    }



}
