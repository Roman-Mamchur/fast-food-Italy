<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\SectionTitel;
use App\Models\TranslateSectionTitel;
use Validator;

class SectionController extends Controller
{
    public function index()
    {
        $section =  SectionTitel::with('translate_section')->first();
        return view('Admin.pages.section.index',compact('section'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'top_ber_message' => 'required|string',
            'top_ber_phone' => 'required|string',
            'top_ber_email' => 'required|string',
        ]);

        $translate = TranslateSectionTitel::where('section_id',$id)->where('lang_code','en')->first();
        $translate->top_ber_message = $request->top_ber_message;
        $translate->top_ber_phone = $request->top_ber_phone;
        $translate->top_ber_email = $request->top_ber_email;
        $translate->save();

        $messase = "Update successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);


    }

    public function editLanguage($langCode)
    {
        $section = SectionTitel::with('translate_section')->first();
        $translate_section  =  TranslateSectionTitel::where('section_id',$section->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.section.index',compact('translate_section','section','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'top_ber_message' => 'required|string',
            'top_ber_phone' => 'required|string',
            'top_ber_email' => 'required|string',
           ]);
        $translate = TranslateSectionTitel::find($id);
        $translate->top_ber_message = $request->top_ber_message;
        $translate->top_ber_phone = $request->top_ber_phone;
        $translate->top_ber_email = $request->top_ber_email;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
