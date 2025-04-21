<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsAndCondition;
use App\Models\TranslateTermsandCondition;
use App\Models\Language;
use Validator;

class TermsConditionController extends Controller
{
    public function index()
    {
        $terms_and_condition = TermsAndCondition::with('termsandcondition_translate')->first();
        return view('Admin.Terms&Conditions',compact('terms_and_condition'));
    }
    public function TermsAndConditionsUpdate(Request $request,$id)
    {
        $request->validate([
            'terms_and_condition' => 'required|string|min:20'
        ]);
        $translate = TranslateTermsandCondition::where('tandc_id',$id)->first();
        $translate->termsandcondition = $request->terms_and_condition;
        $translate->privacy = $translate->privacy;
        $translate->save();

        $message = "Updated Successfully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function editLanguage($langCode)
    {
        $tandc = TermsAndCondition::with('termsandcondition_translate')->first();
        $translate_tandc =  TranslateTermsandCondition::where('tandc_id',$tandc->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.Terms&Conditions',compact('translate_tandc','tandc','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'termsandcondition' => 'required|string',
           ]);
        $translate = TranslateTermsandCondition::find($id);
        $translate->tandc_id = $translate->tandc_id;
        $translate->lang_code = $translate->lang_code;
        $translate->termsandcondition = $request->termsandcondition;
        $translate->privacy = $translate->privacy;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    
}
