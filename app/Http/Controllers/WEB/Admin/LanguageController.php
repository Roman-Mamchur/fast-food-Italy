<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\BlogCategory;
use App\Models\BlogCategoryTranslate;
use App\Models\BlogTranslate;
use App\Models\TranslateAboutUs;
use App\Models\TranslateUser;
use App\Models\TranslateContactpage;
use App\Models\TranslateSubcategory;
use App\Models\TranslateCar;
use App\Models\TranslateSpecification;
use App\Models\TranslateColor;
use App\Models\TranslateExteriorFeature;
use App\Models\TranslateFaq;
use App\Models\TranslateLotFeatur;
use App\Models\TranslateOurFeature;
use App\Models\TranslateOutdoorFeature;
use App\Models\TranslateTermsandCondition;
use App\Models\TranslateProperty;
use App\Models\TranslateFlorPlan;
use App\Models\TranslateSaftyFeature;
use App\Models\TranslateSlider;
use App\Models\TranslateTeam;
use App\Models\TranslateTestimonial;
use App\Models\TranslateWhychooseus;
use App\Models\TranslateCategory;
use App\Models\TranslateChildCategory;
use App\Models\TranslateCountry;
use App\Models\TranslateState;
use App\Models\TranslateCity;
use App\Models\TranslateListingExplores;
use App\Models\TranslateAgency;

use App\Models\TranslateCraftingProcess;
use App\Models\TranslateFooter;
use App\Models\TranslateFooterLink;
use App\Models\TranslateHomepage;
use App\Models\TranslateMobileApp;
use App\Models\TranslateOptionalItem;
use App\Models\TranslateProduct;
use App\Models\TranslateSectionTitel;
use App\Models\TranslateUserLangMessage;
use App\Models\TranslationFaqImages;
use App\Models\UserLangMessage;

use App\Test;

use Validator, File;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        $languages = Language::orderBy('id','ASC')->paginate(8);


        return view('Admin.Language',compact('languages'));
    }
    public function create()
    {
        return view('Admin.CreateLanguage');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lang_code' => 'required|string',
            'text_direction' => 'required|string',
            'status' => 'required',
        ]);
        //*****************About us ***************
        $aboutus_languages = TranslateAboutUs::where('lang_code','en')->get();
        foreach($aboutus_languages as $language)
        {
            $about_us = new TranslateAboutUs();
            $about_us->aboutus_id = $language->aboutus_id;
            $about_us->lang_code = $request->lang_code;
            $about_us->title = $language->title;
            $about_us->main_title = $language->main_title;
            $about_us->description = $language->description;
            $about_us->customer = $language->customer;
            $about_us->text_1 = $language->text_1;
            $about_us->branch = $language->branch;
            $about_us->text_2 = $language->text_2;
            $about_us->save();
        }

       //*****************Blog Category ***************
        $languages = BlogCategoryTranslate::where('lang_code','en')->get();
        foreach($languages as $language)
        {
            $blogCategoryTranslate = new BlogCategoryTranslate();
            $blogCategoryTranslate->blog_category_id = $language->blog_category_id;
            $blogCategoryTranslate->lang_code = $request->lang_code;
            $blogCategoryTranslate->name = $language->name;
            $blogCategoryTranslate->save();
        }


        //*****************Blog ***************
        $blog_languages = BlogTranslate::where('lang_code','en')->get();
        foreach($blog_languages as $language)
        {
            $blogTranslate = new BlogTranslate();
            $blogTranslate->blog_id = $language->blog_id;
            $blogTranslate->lang_code = $request->lang_code;
            $blogTranslate->title = $language->title;
            $blogTranslate->tag = $language->tag;
            $blogTranslate->description = $language->description;
            $blogTranslate->seo_title = $language->seo_title;
            $blogTranslate->seo_description = $language->seo_description;
            $blogTranslate->save();
        }
        //*****************Category***************
        $category_languages = TranslateCategory::where('lang_code','en')->get();
        foreach($category_languages as $language)
        {
            $translate = new TranslateCategory();
            $translate->category_id = $language->category_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }

        //*****************Conatct Us***************
        $contact_languages = TranslateContactpage::where('lang_code','en')->get();
        foreach($contact_languages as $language)
        {
            $translate = new TranslateContactpage();
            $translate->contact_id = $language->contact_id;
            $translate->lang_code = $request->lang_code;
            $translate->heading = $language->heading;
            $translate->title = $language->title;
            $translate->heading2 = $language->heading2;
            $translate->address = $language->address;
            $translate->save();
        }
        //*****************Sub-Category***************
        $sub_category_languages = TranslateSubcategory::where('lang_code','en')->get();
        foreach($sub_category_languages as $language)
        {
            $translate = new TranslateSubcategory();
            $translate->subcategory_id = $language->subcategory_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }
        //*****************Child Category***************
        $child_category_languages = TranslateChildCategory::where('lang_code','en')->get();
        foreach($child_category_languages as $language)
        {
            $translate = new TranslateChildCategory();
            $translate->child_category_id = $language->child_category_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }
        //*****************Country***************
        $country_languages = TranslateCountry::where('lang_code','en')->get();
        foreach($country_languages as $language)
        {
            $translate = new TranslateCountry();
            $translate->country_id = $language->country_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }

        //*****************State***************
        $state_languages = TranslateState::where('lang_code','en')->get();
        foreach($state_languages as $language)
        {
            $translate = new TranslateState();
            $translate->state_id = $language->state_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }

        //*****************City***************
        $city_language = TranslateCity::where('lang_code','en')->get();
        foreach($city_language as $language)
        {
            $translate = new TranslateCity();
            $translate->city_id = $language->city_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->save();
        }

        //*****************Translate Specification***************
        $specification_languages = TranslateSpecification::where('lang_code','en')->get();
        foreach($specification_languages as $language)
        {
            $translate = new TranslateSpecification();
            $translate->specification_id = $language->specification_id;
            $translate->lang_code = $request->lang_code;
            $translate->title = $language->title;
            $translate->description = $language->description;
            $translate->save();
        }

        //***************** Translate FAQ ***************
        $faq_language = TranslateFaq::where('lang_code','en')->get();
        foreach($faq_language as $language)
        {
        $translate = new TranslateFaq();
        $translate->faq_id = $language->faq_id;
        $translate->lang_code = $request->lang_code;
        $translate->question = $language->question;
        $translate->answer = $language->answer;
        $translate->save();
        }

        //*****************Translate Terms and Condition***************
        $tandc_language = TranslateTermsandCondition::where('lang_code','en')->get();
        foreach($tandc_language as $language)
        {
            $translate = new TranslateTermsandCondition();
            $translate->tandc_id = $language->tandc_id;
            $translate->lang_code = $request->lang_code;
            $translate->termsandcondition = $language->termsandcondition;
            $translate->privacy = $language->privacy;
            $translate->save();
        }

        //*****************Translate Slider***************
        $slider_language = TranslateSlider::where('lang_code','en')->get();
        foreach($slider_language as $language)
        {
        $translate = new TranslateSlider();
        $translate->slider_id = $language->slider_id;
        $translate->lang_code = $request->lang_code;
        $translate->title = $language->title;
        $translate->save();
        }

        //*****************Translate Team***************
        $team_language = TranslateTeam::where('lang_code','en')->get();
        foreach($team_language as $language)
        {
          $translate = new TranslateTeam();
          $translate->team_id = $language->team_id;
          $translate->lang_code = $request->lang_code;
          $translate->name = $language->name;
          $translate->designation = $language->designation;
          $translate->save();
        }

         //*****************Translate Testimonial***************
         $testimonial_language = TranslateTestimonial::where('lang_code','en')->get();
         foreach($testimonial_language as $language)
         {
           $translate = new TranslateTestimonial();
           $translate->testimonial_id = $language->testimonial_id;
           $translate->lang_code = $request->lang_code;
           $translate->name = $language->name;
           $translate->designation = $language->designation;
           $translate->comment = $language->comment;
           $translate->save();
         }

         //*****************Translate Crafting process ***************
         $testimonial_crafting = TranslateCraftingProcess::where('lang_code','en')->get();
         foreach($testimonial_crafting as $language)
         {
           $translate = new TranslateCraftingProcess();
           $translate->crafting_id = $language->crafting_id;
           $translate->lang_code = $request->lang_code;
           $translate->title = $language->title;
           $translate->step_1 = $language->step_1;
           $translate->detils_1 = $language->detils_1;
           $translate->step_2 = $language->step_2;
           $translate->detils_2 = $language->detils_2;
           $translate->step_3 = $language->step_3;
           $translate->detils_3 = $language->detils_3;
           $translate->step_4 = $language->step_4;
           $translate->detils_4 = $language->detils_4;
           $translate->save();
         }

          //*****************Translate TranslateFooter ***************
          $testimonial_footer= TranslateFooter::where('lang_code','en')->get();
          foreach($testimonial_footer as $language)
          {
            $translate = new TranslateFooter();
            $translate->footer_id = $language->footer_id;
            $translate->lang_code = $request->lang_code;
            $translate->about_us = $language->about_us;
            $translate->first_column = $language->first_column;
            $translate->second_column = $language->second_column;
            $translate->copyright = $language->copyright;
            $translate->save();
          }

           //*****************Translate TranslateFooterLink ***************
         $testimonial_footer_link = TranslateFooterLink::where('lang_code','en')->get();
         foreach($testimonial_footer_link as $language)
         {
           $translate = new TranslateFooterLink();
           $translate->footer_link_id = $language->footer_link_id;
           $translate->lang_code = $request->lang_code;
           $translate->title = $language->title;
           $translate->save();
         }


          //*****************Translate TranslateMobileApp ***************
          $testimonial_mobileapp = TranslateMobileApp::where('lang_code','en')->get();
          foreach($testimonial_mobileapp as $language)
          {
            $translate = new TranslateMobileApp();
            $translate->app_id = $language->app_id;
            $translate->lang_code = $request->lang_code;
            $translate->titel = $language->titel;
            $translate->description = $language->description;
            $translate->save();
          }

           //*****************Translate TranslateOptionalItem ***************
         $testimonial_optionalitem = TranslateOptionalItem::where('lang_code','en')->get();
         foreach($testimonial_optionalitem as $language)
         {
           $translate = new TranslateOptionalItem();
           $translate->item_id = $language->item_id;
           $translate->lang_code = $request->lang_code;
           $translate->name = $language->name;
           $translate->save();
         }

          //*****************Translate TranslateProduct ***************
          $testimonial_translateproduct = TranslateProduct::where('lang_code','en')->get();
          foreach($testimonial_translateproduct as $language)
          {
            $translate = new TranslateProduct();
            $translate->product_id = $language->product_id;
            $translate->lang_code = $request->lang_code;
            $translate->name = $language->name;
            $translate->long_description = $language->long_description;
            $translate->vedio_top_ber_description = $language->vedio_top_ber_description;
            $translate->vedio_buttom_description = $language->vedio_buttom_description;
            $translate->size = $language->size;
            $translate->specifaction = $language->specifaction;
            $translate->save();
          }

          //*****************Translate TranslationFaqImages ***************
          $testimonial_faqimage = TranslationFaqImages::where('lang_code','en')->get();
          foreach($testimonial_faqimage as $language)
          {
            $translate = new TranslationFaqImages();
            $translate->faq_img_id = $language->faq_img_id;
            $translate->lang_code = $request->lang_code;
            $translate->titel = $language->titel;
            $translate->first_description = $language->first_description;
            $translate->secend_description = $language->secend_description;
            $translate->save();
          }

          //*****************Translate Section Titel ***************
          $testimonial_section = TranslateSectionTitel::where('lang_code','en')->get();
          foreach($testimonial_section as $language)
          {
            $translate = new TranslateSectionTitel();
            $translate->section_id = $language->section_id;
            $translate->lang_code = $request->lang_code;
            $translate->top_ber_message = $language->top_ber_message;
            $translate->top_ber_phone = $language->top_ber_phone;
            $translate->top_ber_email = $language->top_ber_email;
            $translate->category_titel = $language->category_titel;
            $translate->featured_titel = $language->featured_titel;
            $translate->promotion_titel = $language->promotion_titel;
            $translate->traditional_food_titel = $language->traditional_food_titel;
            $translate->testonimal_titel = $language->testonimal_titel;
            $translate->news_titel = $language->news_titel;
            $translate->subscribe_titel = $language->subscribe_titel;
            $translate->payment_titel = $language->payment_titel;
            $translate->authinaction_titel = $language->authinaction_titel;
            $translate->login_page_titel_one = $language->login_page_titel_one;
            $translate->login_page_titel_two = $language->login_page_titel_two;
            $translate->login_page_titel_three = $language->login_page_titel_three;
            $translate->register_page_titel = $language->register_page_titel;
            $translate->forget_page_titel_one = $language->forget_page_titel_one;
            $translate->forget_page_titel_two = $language->forget_page_titel_two;
            $translate->forget_page_titel_three = $language->forget_page_titel_three;
            $translate->save();
          }

        $language = new Language();
        $language->name = $request->name;
        $language->lang_code = $request->lang_code;
        $language->text_direction = $request->text_direction;
        $language->status = $request->status;
        $language->save();

        $path = base_path().'/lang'.'/'.$request->lang_code;

        if (! File::exists($path)) {
            File::makeDirectory($path);

            $sourcePath = base_path().'/lang/en';
            $destinationPath = $path;

            // Get all files from the source folder
            $files = File::allFiles($sourcePath);

            foreach ($files as $file) {
                $destinationFile = $destinationPath . '/' . $file->getRelativePathname();

                // Copy the file to the destination folder
                File::copy($file->getRealPath(), $destinationFile);
            }
        }

        $message = 'Created succssfully';
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('languages.index')->with($notification);
    }
    public function edit($id)
    {
        $language = Language::find($id);
        return view('Admin.EditLanguages',compact('language'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'text_direction' => 'required|string',
            'status' => 'required',
        ]);
        $language = Language::find($id);
        $language->name = $request->name;
        $language->text_direction = $request->text_direction;
        $language->status = $request->status;
        $language->save();

        $message = 'Updtae succssfully';
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->route('languages.index')->with($notification);

    }

    public function delete($id)
    {
        if($id == 3){
            $message = trans('translate.You can not delete english language');
            $notification = array('message'=>$message,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $language = Language::find($id);
        $lang_code = $language->lang_code;

        TranslateAboutUs::where('lang_code',$lang_code)->delete();
        BlogCategoryTranslate::where('lang_code',$lang_code)->delete();
        BlogTranslate::where('lang_code',$lang_code)->delete();
        TranslateCategory::where('lang_code',$lang_code)->delete();
        TranslateContactpage::where('lang_code',$lang_code)->delete();
        TranslateSubcategory::where('lang_code',$lang_code)->delete();
        TranslateChildCategory::where('lang_code',$lang_code)->delete();
        TranslateCountry::where('lang_code',$lang_code)->delete();
        TranslateState::where('lang_code',$lang_code)->delete();
        TranslateCity::where('lang_code',$lang_code)->delete();
        TranslateSpecification::where('lang_code',$lang_code)->delete();
        TranslateFaq::where('lang_code',$lang_code)->delete();
        TranslateTermsandCondition::where('lang_code',$lang_code)->delete();
        TranslateSlider::where('lang_code',$lang_code)->delete();
        TranslateTeam::where('lang_code',$lang_code)->delete();
        TranslateTestimonial::where('lang_code',$lang_code)->delete();
        TranslateCraftingProcess::where('lang_code',$lang_code)->delete();
        TranslateFooter::where('lang_code',$lang_code)->delete();
        TranslateFooterLink::where('lang_code',$lang_code)->delete();
        TranslateMobileApp::where('lang_code',$lang_code)->delete();
        TranslateOptionalItem::where('lang_code',$lang_code)->delete();
        TranslateProduct::where('lang_code',$lang_code)->delete();
        TranslateSectionTitel::where('lang_code',$lang_code)->delete();
        TranslateUserLangMessage::where('lang_code',$lang_code)->delete();
        TranslationFaqImages::where('lang_code',$lang_code)->delete();
        UserLangMessage::where('lang_code',$lang_code)->delete();
        $language->delete();

        $path = base_path().'/lang'.'/'.$lang_code;

        if (File::exists($path)) {
            File::deleteDirectory($path);
        }

        $message = 'Delete succssfully';
        $notification = array('message'=>$message,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
    public function status($id)
    {
    try{
        $update_status = 'active';
        $language = Language::find($id);
        if($language->status == 'active')
        {
            $update_status = 'inactive';
        }else{
            $update_status = 'active';
        }
        $language->update([
            'status' => $update_status
        ]);
        return response()->json(array(
            'status' => 200,
            'update' => 'updated',
        ));
        }catch(\Exception $e)
        {
            return response()->json(array(
                'status' => 500,
                'update' => $e->getMessage(),
            ));
        }

    }
}
