<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OptionalItem;
use App\Models\TranslateOptionalItem;
use App\Models\Language;

class OptionalItemController extends Controller
{
    public function create()
    {
        return view('Admin.pages.optional_item.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'status' => 'required'
        ]);

        $item = new OptionalItem();
        $item->price = $request->price;
        $item->status = $request->status;
        $item->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
            $translate = new TranslateOptionalItem();
            $translate->item_id = $item->id;
            $translate->lang_code = $language->lang_code;
            $translate->name = $request->name;
            $translate->save();
        }
        $message = "Create successfully";
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('optional.item')->with($notification);


    }
    public function index()
    {
        $items = OptionalItem::with('translate_item')->paginate(10);
        return view('Admin.pages.optional_item.index',compact('items'));
    }
    public function edit($id)
    {
        $item = OptionalItem::with('translate_item')->find($id);
        return view('Admin.pages.optional_item.edit',compact('item'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'status' => 'required'
        ]);

        $item = OptionalItem::find($id);
        $item->price = $request->price;
        $item->status = $request->status;
        $item->save();

        $languages = Language::where('status', 'active')->select('id','name','lang_code')->get();
        foreach($languages as $language)
        {
          $translate = new TranslateOptionalItem();
          $translate->item_id = $item->id;
          $translate->lang_code = $language->lang_code;
          $translate->name = $request->name;
          $translate->save();
        }

        $message = "Updated successfully";
        $notification = array('message' => $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editLanguage($itemId,$langCode)
    {
        $item =  OptionalItem::with('translate_item')->find($itemId);
        $translate_item =  TranslateOptionalItem::where('item_id',$itemId)->where('lang_code',$langCode)->first();
        $selected_language = Language::where('lang_code',$langCode)->select('name')->first();
        return view('Admin.pages.optional_item.edit',compact('translate_item','item','selected_language'));
    }
    public function updateLanguage(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $tr = TranslateOptionalItem::find($id);
        $tr->item_id = $tr->item_id;
        $tr->lang_code = $tr->lang_code;
        $tr->name = $request->name;
        $tr->save();

        $message = "Update Successfully!!";
        $notification = array('message'=> $message,'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function Status($id)
    {
        try{
            $item = OptionalItem::find($id);
            $update_status = 1;
            $item = OptionalItem::find($id);
            if($item->status == 'active')
            {
                $update_status = 'inactive';
            }else{
                $update_status = 'active';
            }
            $item_status = $item->update([
                'status' => $update_status
            ]);
            return response()->json([
                'status' => '200',
                'message' => 'Status Updated',
            ]);
            }catch(\Exception $e)
            {
                return response()->json([
                    'status' => '200',
                    'message' => $e->getMessage(),
                ]);
            }
    }

    public function delete($id)
    {
        try{

            $item = OptionalItem::findOrFail($id);
            $delete = $item->delete();
            TranslateOptionalItem::where('item_id',$item->id)->delete();
            $message = "Delete Optional Item successfully";
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }catch(\Exception $e)
        {
            $message = $e->getMessage();
            $notification = array('message'=>$message,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }
}
