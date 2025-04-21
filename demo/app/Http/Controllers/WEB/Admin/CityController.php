<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Language;
use App\Models\TranslateCity;
use Validator;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::with('translate_city','state.translate_state')->orderBy('id','DESC')->paginate(8);
        return view('Admin.City',compact('cities'));
    }
    public function create()
    {
        $countries = Country::with('translate_country')->get();
        return view('Admin.CreateCity',compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|integer',
            'state_id'   => 'required|integer',
            'name'       => 'required|string',
            'slug'       => 'required|string|unique:cities,slug',
            'status'     => 'required|string',
        ]);
        $city = new City();
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->slug = $request->slug;
        $city->status = $request->status;
        $city->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new TranslateCity();
          $translate->city_id = $city->id;
          $translate->lang_code = $language->lang_code;
          $translate->name = $request->name;
          $translate->save();
        }

        $message = "Insert Successfully!";
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->route('cities.edit',$city->id)->with($notification);
    }
    public function show($id)
    {
        $state = State::with('translate_state')->where('country_id',$id)->get();
        return response()->json(array(
            'success' =>200,
            'state'   =>$state
        ));
    }
    public function edit($id)
    {
        $countries = Country::with('translate_country')->get();
        $states = State::with('translate_state')->get();
        $city = City::with('translate_city')->find($id);
        return view('Admin.EditCity',compact('city','states','countries'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'name'     => 'required|string',
            'slug'     => 'required|string|unique:cities,slug,'.$id,
            'status'   => 'required|string',
        ]);
        $city = City::find($id);
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->slug = $request->slug;
        $city->status = $request->status;
        $city->save();

        $translate = TranslateCity::where('city_id',$id)->where('lang_code','en')->first();
        $translate->city_id = $translate->city_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();

        $message = "Updated Successfully!!";
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
       try{
            $city = City::find($id);
            $city->delete();
            TranslateCity::where('city_id',$id)->delete();

            $message = "Delete City Successfully!!";
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);

       }catch(Exception $e)
       {
            $message = $e->getMessage();
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
       }
    }

    public function editLanguage($cityId,$langCode)
    {
        $city =  City::with('translate_city')->find($cityId);
        $translate_city =  TranslateCity::where('city_id',$cityId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditCity',compact('translate_city','city','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
           ]);

        $translate = TranslateCity::find($id);
        $translate->city_id = $translate->city_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function UpdateCityStatus($id)
    {
        try{
        $update_status = 'active';
        $city = City::find($id);
        if($city->status == 'active')
        {
            $update_status = 'inactive';

        }else{
            $update_status = 'active';
        }
        $city->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'update successfully'
        ]);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

}
