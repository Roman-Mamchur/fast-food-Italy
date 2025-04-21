<?php

namespace App\Http\Controllers\WEB\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MobileApp;
use App\Models\Setting;
use App\Models\User;
use App\Models\Addresse;
use App\Models\Card;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Wishlist;
use Carbon\Carbon;
use App\Models\DeleveryArea;
use Image;
use Str;
use File;
Use Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    public function UserDashboard(){
        if (Auth::user()) {
            $data['totalOrder'] = Order::where('user_id',auth::user()->id)->count();
            $data['totalOrderNew'] = Order::where('user_id',auth::user()->id)->where('order_status',1)->count();
            $data['totalOrderComplte'] = Order::where('user_id',auth::user()->id)->where('order_status',3)->count();
            $data['address'] = Addresse::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->limit(2)->get();
            $data['DeleveryAreas'] = DeleveryArea::all();
            return view('Frontend.User.dashboard',$data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }
    public function cardIndex(){
        $cards = Card::where('user_id', auth()->user()->id)->get();
        // dd($cards);
        return view('Frontend.User.card', ['cards' => $cards]);
    }
    public function cardEdit(Request $request){
        $card = Card::find($request->id);
        if ($card) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $card->id,
                    'card_number' => decrypt($card->card_number),
                    'month' => $card->month,
                    'year' => $card->year,
                    'cvc' => decrypt($card->cvc),
                ]
            ]);
        }
        return response()->json(['success' => false, 'message' => 'Card not found!']);
    }

    public function cardStore(Request $request){
        $request->validate([
            'card_number'  => 'required|string|min:16',
            'month'        => 'required|numeric|min:1|max:12',
            'year'         => 'required|numeric|min:' . date('Y'),
            'cvc'          => 'required|numeric|digits_between:3,4',
        ]);
        if($request->card_id !== null){
            $card = Card::find($request->card_id);
            $card->card_number  = encrypt($request->card_number);
            $card->month = $request->month;
            $card->year  = $request->year;
            $card->user_id  = Auth::id();
            $card->cvc = encrypt($request->cvc); 
            $card->save();
            return response()->json(['message' => 'Card details added successfully!'], 200);

        } else {

            $card = new Card(); // Assuming CardDetail is the model
            $card->card_number  = encrypt($request->card_number); // Encrypt for security
            $card->month = $request->month;
            $card->year  = $request->year;
            $card->user_id  = Auth::id();
            $card->cvc          = encrypt($request->cvc); // Encrypt CVV for security
            $card->save();
            $cards = Card::where('user_id', auth()->id())->get()->map(function ($card) {
                return [
                    'id' => $card->id,
                    'card_number' => decrypt($card->card_number),
                    'month' => $card->month,
                    'year' => $card->year,
                    'user_id' => $card->user_id,
                ];
            });
            return response()->json(['message' => 'Card details added successfully!', 'cards' => $cards], 200);
        }
    
        // Store the data

        // return redirect()->back();
    }
    public function UserProfile(){
        $data['countries'] = Country::all();
        $data['DeleveryAreas'] = DeleveryArea::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('Frontend.User.edit_profile',$data);
    }

    public function address(){
        $data['countries'] = Country::all();
        $data['DeleveryAreas'] = DeleveryArea::all();
        $data['address'] = Addresse::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('Frontend.User.address',$data);
    }

    public function addressEdit($id){
        $data['countries'] = Country::all();
        $data['DeleveryAreas'] = DeleveryArea::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        $data['address'] = Addresse::find($id);

        return view('Frontend.User.address-edit',$data);
    }

    public function addressUpdate(Request $request, $id){
        $rules = [
            'name'=>'required',
            'area_id'=>'required',
            'address'=>'required',
            'address_type'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
            'phone.required' => trans('translate.Phone is required'),
            'area_id.required' => trans('translate.Area is required'),
            'address.required' => trans('translate.Address is required'),
            'address_type.required' => trans('translate.Address type is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $address = Addresse::find($id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->area_id = $request->area_id;
        $address->address = $request->address;
        $address->address_type = $request->address_type;
        $address->save();

        $message = trans('translate.Address added successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->route('user.address')->with($notification);
    }

    public function order(){
        $data = Order::orderBy('id', 'desc')->paginate(10);
        $setting =  Setting::first();
        $order = Order::where('user_id',auth::user()->id)->orderBy('id','DESC')->paginate(10);
        return view('Frontend.User.order',compact('data','setting','order'));
    }

    public function orderDetils($id){
        if (Auth::user()) {
            $data['setting'] =  Setting::first();
            $data['order'] = Order::find($id);
            $data['OrderItem'] = OrderItem::where('order_id',$id)->get();
            return view('Frontend.User.order_detils',$data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function wishlist(){
        if (Auth::user()) {
            $data['wishlist'] = Wishlist::where('user_id', Auth::user()->id)->get();
            return view('Frontend.User.wishlist',$data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function review(){
        if (Auth::user()) {
            $data['reviews'] = Review::with('Product')->where('status',1)->where('user_id', Auth::user()->id)->orderBy('id','DESC')->get();
            return view('Frontend.User.reviews',$data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function changePassword(){
        return view('Frontend.User.change_password');
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    public function UpdateProfile(Request $request, $id)
    {

        $rules = [
            'name'=>'required',
            'phone'=>'required',
            // 'address'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
            'phone.required' => trans('translate.Phone is required'),
            // 'address.required' => trans('translate.Address is required'),
        ];
        $this->validate($request, $rules,$customMessages);
        $user = user::find($id);
        $old_image = $user->image;
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug('user-images').date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }else{
            $image_name = $user->image;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $image_name;
        $user->save();

        $message = trans('translate.Profile updated successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function ChnagePassword(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:4',
        ];

        $customMessages = [
            'old_password.required' => trans('translate.Current Password is required'),
            'password.required' => trans('translate.New Password is required'),
            'password.min' => trans('translate.You have to provide minimum 4 character password'),
        ];
        $this->validate($request, $rules,$customMessages);

            $validate = Validator::make($request->all(),[
                'old_password' => 'required',
                'password' => 'required',
            ]);

            $user = Auth::user();
            if(Hash::check($request->old_password ,$user->password))
            {
                $update = $user->update([
                    'password' => Hash::make($request->password)
            ]);
                if($update)
                {
                    $message = trans('translate.Password change successfully');
                    $notification = array('message' => $message, 'alert-type' => 'success');
                    return redirect()->back()->with($notification);
                }
            }
            else{
                $message = trans('translate.Current Password does not match');
                $notification = array('message' => $message, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
    }

    public function addNewAddress(Request $request)
    {
        $rules = [
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required',
            'area_id'=>'required',
            'address'=>'required',
            'address_type'=>'required',
        ];

        $customMessages = [
            'fname.required' => trans('translate.Name is required'),
            'phone.required' => trans('translate.Phone is required'),
            'area_id.required' => trans('translate.Area is required'),
            'address.required' => trans('translate.Address is required'),
            'address_type.required' => trans('translate.Address type is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $address = new Addresse();
        $address->user_id = auth::user()->id;
        $address->name = $request->fname . ' ' . $request->lname;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->area_id = $request->area_id;
        $address->address = $request->address;
        $address->address_type = $request->address_type;
        $address->save();

        $message = trans('translate.Address added successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function cardDelete($id){
        $card = Card::find($id);
        if($card){
            $card->delete();
            $message = trans('Card removed successful');
            $notification = array('message'=> $message,'alert-type'=> 'success');
            return redirect()->back()->with($notification);
        } else {
            $message = trans('Card Not Exist');
            $notification = array('message'=> $message,'alert-type'=> 'error');
            return redirect()->back()->with($notification);

        }

    }

    public function removeAddress($id)
    {
        if(Order::where('address_id', $id)->count() == 0){
            $address = Addresse::find($id);
            if($address->user_id == auth::user()->id){
                $address->delete();

                $message = trans('translate.Address removed successful');
                $notification = array('message'=> $message,'alert-type'=> 'success');
                return redirect()->back()->with($notification);
            }else{
                $message = trans('translate.Something went wrong');
                $notification = array('message' => $message, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }else{
            $message = trans('translate.Multiple order existing in this address, so you can not delete it');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }



    }



}
