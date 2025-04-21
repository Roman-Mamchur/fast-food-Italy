<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\LangMessage;
use File;
class FrontendLanguageController extends Controller
{
    public function index($langCode)
    {
        if(File::exists('lang/'.$langCode.'/translate.php')) {
            $data = include('lang/'.$langCode.'/translate.php');
        }else{
            $notification=trans('translate.Your requested language does not exist');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();

        return view('Admin.FontendLanguage',compact('selected_language','data', 'langCode'));
    }

    public function update(Request $request ,$id)
    {

        $dataArray = [];
        foreach($request->values as $index => $value){
            $dataArray[$index] = $value;
        }

        file_put_contents('lang/'.$request->lang_code.'/translate.php', "");
        $dataArray = var_export($dataArray, true);
        file_put_contents('lang/'.$request->lang_code.'/translate.php', "<?php\n return {$dataArray};\n ?>");

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
