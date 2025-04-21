<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\State;
use  App\Models\Language;
use  App\Models\Country;
use  App\Models\TranslateState;
use Validator;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('translate_state','country.translate_country')->orderBy('id','DESC')->paginate(10);
        return view('Admin.States',compact('states'));
    }
    public function create()
    {
        $countries = Country::with('translate_country')->where('status','active')->get();
        return view('Admin.CreateState',compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:countries,slug',
            'country_id' => 'required',
        ]);
        $state = new State();
        $state->country_id = $request->country_id;
        $state->slug = $request->slug;
        $state->status = $request->status;
        $state->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new TranslateState();
          $translate->state_id = $state->id;
          $translate->lang_code = $language->lang_code;
          $translate->name = $request->name;
          $translate->save();
        }

        $message = "Created succefully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->route('states.edit',$state->id)->with($notification);
    }
    public function edit($id)
    {
        $state = State::with('translate_state')->find($id);
        $countries = Country::with('translate_country')->get();
        return view('Admin.EditState',compact('state', 'countries'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:states,slug',
            'country_id' => 'required|integer',
            'status' => 'required|string',
        ]);
        $state = State::find($id);
        $state->country_id = $request->country_id;
        $state->slug = $request->slug;
        $state->status = $request->status;
        $state->save();

        $translate = TranslateState::where('state_id',$id)->where('lang_code','en')->first();
        $translate->state_id = $translate->state_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();


        $message = "Update succefully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
        $state = State::find($id);
        $state->delete();
        TranslateState::where('state_id',$id)->delete();

        $message = "Delete succefully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->route('states.index')->with($notification);
    }

    public function editLanguage($stateId,$langCode)
    {
        $state =  State::with('translate_state')->find($stateId);
        $translate_state =  TranslateState::where('state_id',$stateId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditState',compact('translate_state','state','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
           ]);

        $translate = TranslateState::find($id);
        $translate->state_id = $translate->state_id;
        $translate->lang_code = $translate->lang_code;
        $translate->name = $request->name;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        $update_status = 'active';
        $state = State::find($id);
        if($state->status == 'active')
        {
            $update_status = 'inactive';
        }else{
            $update_status = 'active';
        }
        $state->update([
            'status' => $update_status
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Status Updated',
        ]);
    }
}
