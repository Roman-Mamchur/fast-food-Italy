<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\TranslateFaq;
use App\Models\Language;
use Validator;

class FAQController extends Controller
{
    public function index()
    {
        $faqs =  Faq::with('translate_faq')->orderBy('id','DESC')->paginate(8);
        return view('Admin.pages.faq.faq',compact('faqs'));
    }
    public function create()
    {
        return view('Admin.CreateFAQ');
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|min:10',
            'answer' => 'required|string|min:10',
            'status' => 'required',
        ]);
        $faq = new Faq();
        $faq->status = $request->status;
        $faq->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
        $translate = new TranslateFaq();
        $translate->faq_id = $faq->id;
        $translate->lang_code = $language->lang_code;
        $translate->question = $request->question;
        $translate->answer = $request->answer;
        $translate->save();
        }
        $messase = "Create successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->route('faqs.edit', $faq->id)->with($notification);
    }
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('Admin.EditFAQ',compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|min:10',
            'answer' => 'required|string|min:10',
            'status' => 'required',
        ]);
        $faq = Faq::find($id);
        $faq->status = $request->status;
        $faq->save();

        $translate = TranslateFaq::where('faq_id',$id)->where('lang_code','en')->first();
        $translate->faq_id = $translate->faq_id;
        $translate->lang_code = $translate->lang_code;
        $translate->question = $request->question;
        $translate->answer = $request->answer;
        $translate->save();

        $messase = "Update Successfully";
        $notification = array('message' => $messase,'alert-type'=> 'success');
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
       try{
            $faq = Faq::find($id);
            $faq->delete();
            TranslateFaq::where('faq_id',$id)->delete();

            $messase = "Delete successfully";
            $notification = array('message' => $messase,'alert-type'=> 'success');
            return redirect()->route('faqs.index')->with($notification);

       }catch(\Exception $e)
       {
            $messase  = $e->getMessage();
            $notification = array('message' => $messase,'alert-type'=> 'error');
            return redirect()->back()->with($notification);
       }
    }

    public function editLanguage($faqId,$langCode)
    {
        $faq =  Faq::with('translate_faq')->find($faqId);
        $translate_faq =  TranslateFaq::where('faq_id',$faqId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.EditFAQ',compact('translate_faq','faq','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
           ]);

        $translate = TranslateFaq::find($id);
        $translate->faq_id = $translate->faq_id;
        $translate->lang_code = $translate->lang_code;
        $translate->question = $request->question;
        $translate->answer = $request->answer;
        $translate->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function ChangeStatus($id)
    {
       try{
        $update_status = 'active';
        $faq = Faq::find($id);
        if($faq->status == 'active')
        {
            $update_status = 'inactive';

        }else{
            $update_status = 'active';
        }
        $faq->update([
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
