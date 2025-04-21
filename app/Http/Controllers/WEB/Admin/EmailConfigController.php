<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailConfiguration;
use App\Models\EmailTemplate;

class EmailConfigController extends Controller
{

    public function index()
    {
        $email_configuration = EmailConfiguration::first();
        return view('Admin.EmailConfig',compact('email_configuration'));
    }

    public function edit($id)
    {
        $email_template = EmailTemplate::find($id);
        return view('Admin.EditEmailTemplate',compact('email_template'));

    }
    public function update(Request $request, $id)
    {
        $email = EmailConfiguration::first();
        $email->mail_host = $request->mail_host;
        $email->email = $request->email;
        $email->smtp_username = $request->smtp_username;
        $email->smtp_password = $request->smtp_password;
        $email->mail_port = $request->mail_port;
        $email->mail_encryption = $request->mail_encryption;
        $email->save();

        $notification=  'Update Successfully';
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function EmailTemplateIndex()
    {
        $email_template = EmailTemplate::all();
        return view('Admin.EmailTemplate',compact('email_template'));
    }
    public function EmailTemplateUpdate(Request $request,$id)
    {

        try{
            $email = EmailTemplate::find($id);
            $email->name = $request->name;
            $email->subject = $request->subject;
            $email->description = $request->e_description;
            $email->save();
            $notification=  'Update Successfully!!!';
            $notification=array('message'=>$notification,'alert-type'=>'success');
            return redirect()->route('email-config.template.index')->with($notification);
        }catch(\Excepion $e)
        {
            $notification=  $e->getMessage();
            $notification=array('message'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }


}
