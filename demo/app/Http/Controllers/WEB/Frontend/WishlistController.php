<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session('wishlist', []);

        return $wishlist;
    }
    public function add(Request $request, $product_id)
    {
        if (!auth()->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have to login first',
            ], 401);
        }

        $user_id = auth()->id();

        if (Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item already added in wishlist',
            ]);
        }

        Wishlist::create(['user_id' => $user_id, 'product_id' => $product_id]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to wishlist',
        ]);
    }

    // public function add($product_id)
    // {

    //     if (auth()->check()) {
    //         $user_id = auth()->user()->id;
    //         if (!Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
    //             Wishlist::create(['user_id' => $user_id, 'product_id' => $product_id]);

    //             $message = trans('translate.Item added to wishlist');
    //             $notification = ['message' => $message, 'alert-type' => 'success'];
    //         } else {
    //             $message = trans('translate.Item already added in wishlist');
    //             $notification = ['message' => $message, 'alert-type' => 'error'];
    //         }
    //     } else {
    //         $message = trans('translate.You have to login first');
    //         $notification = ['message' => $message, 'alert-type' => 'error'];
    //         return redirect()->route('index')->with($notification);
    //     }

    //     return redirect()->back()->with($notification);

    // }

    public function removeR($product_id)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            Wishlist::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->delete();
            $message = trans('translate.Item removed successfully');
            $notification = ['message' => $message, 'alert-type' => 'success'];
        } else {
            $message = trans('translate.You have to login first');
            $notification = ['message' => $message, 'alert-type' => 'error'];
        }

        return redirect()->back()->with($notification);
    }
    public function remove(Request $request, $product_id)
    {
        if (!auth()->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have to login first',
            ], 401);
        }

        $user_id = auth()->id();

        if ($wishlist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first()) {
            $wishlist->delete();
            $totalwishlist = Wishlist::where('user_id', $user_id)->count();
            return response()->json([
                'status' => 'success',
                'status' => $totalwishlist,
                'message' => 'Item removed from wishlist',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item not found in wishlist',
        ]);
    }
}
