<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPage as ContactUs;
use App\Models\TranslateContactpage;
use App\Models\Language;

class ContactUsController extends Controller
{
    public function edit()
    {
        $contactus = ContactUs::with('translate_contactus')->first();
        return view('Admin.ContactUs', compact('contactus'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'phone' => 'required',
            'google_map' => 'required|string',
            'heading' => 'required',
            'title' => 'required',
            'heading2' => 'required|string',
        ]);
        $contact = ContactUs::first();
        $contact->email = $request->email;
        $contact->email2 = $request->email2;
        $contact->phone = $request->phone;
        $contact->phone2 = $request->phone2;
        $contact->google_map = $request->google_map;
        $contact->save();


        $translate = TranslateContactpage::where('contact_id',$contact->id)->first();
        $translate->contact_id = $translate->contact_id;
        $translate->lang_code = $translate->lang_code;
        $translate->heading = $request->heading;
        $translate->title = $request->title;
        $translate->heading2 = $request->heading2;
        $translate->address = $request->address;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editLanguage($langCode)
    {
        $contactus =  ContactUs::with('translate_contactus')->first();
        $translate_conatctus =  TranslateContactpage::where('contact_id',$contactus->id)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.ContactUs',compact('translate_conatctus','contactus','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {

        $request->validate([
            'heading' => 'required',
            'title' => 'required',
            'heading2' => 'required|string',

        ]);
        $translate = TranslateContactpage::find($id);
        $translate->contact_id = $translate->contact_id;
        $translate->lang_code = $translate->lang_code;
        $translate->heading = $request->heading;
        $translate->title = $request->title;
        $translate->heading2 = $request->heading2;
        $translate->address = $request->address;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
