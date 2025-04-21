<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Country;
use App\Models\TranslateCountry;
use Validator;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('translate_country')->orderBy('id','DESC')->paginate(10);
        return view('Admin.Countries',compact('countries'));
    }
    public function create()
    {
        return view('Admin.CreateCountry');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:countries,slug',
            'status' => 'required|string',
        ]);

        $country = new Country();
        $country->slug = $request->slug;
        $country->status = $request->status;
        $country->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new TranslateCountry();
          $translate->country_id = $country->id;
          $translate->lang_code = $language->lang_code;
          $translate->name = $request->name;
          $translate->save();
        }
        $message = "Created succefully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->route('countries.edit',$country->id)->with($notification);

    }
    public function edit($id)
    {
        $country = Country::with('translate_country')->find($id);
        return view('Admin.EditCountry',compact('country'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:countries,slug',
            'status' => 'required|string',
        ]);

        $country = Country::find($id);
        $country->slug = $request->slug;
        $country->status = $request->status;
        $country->save();

        $translate = TranslateCountry::where('country_id',$id)->where('lang_code','en')->first();
        $translate->country_id = $translate->country_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();

        $message = "Created succefully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
       try{
        $country = Country::find($id);
        $delete_country = $country->delete();
        TranslateCountry::where('country_id',$id)->delete();
        $message = "Country deleted successfully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
       }catch(\Exception $e)
       {
            $message = $e->getMessage();
            $notification = array('message' => $message,'alert-type' => 'error');
            return redirect()->back()->with($notification);
       }
    }


    public function editLanguage($countryId,$langCode)
    {
        $country =  Country::with('translate_country')->find($countryId);
        $translate_country =  TranslateCountry::where('country_id',$countryId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditCountry',compact('translate_country','country','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
           ]);

        $tr = TranslateCountry::find($id);
        $tr->country_id = $tr->country_id;
        $tr->lang_code = $tr->lang_code;
        $tr->name = $request->name;
        $tr->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        $update_status = 'active';
        $subcategory = Country::find($id);
        if($subcategory->status == 'active')
        {
            $update_status = 'inactive';
        }else{
            $update_status = 'active';
        }
        $subcategory->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Statuss Updated',
        ]);
    }
}
