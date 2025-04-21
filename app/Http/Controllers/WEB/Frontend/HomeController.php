<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Partner;
use App\Models\CraftingProcess;
use App\Models\Faq;
use App\Models\FaqImages;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\MobileApp;
use App\Models\SectionTitel;
use App\Models\AboutUs;
use App\Models\ContactPage;
use App\Models\ProductGallery;
use App\Models\Subscriber;
use Carbon\Carbon;
use App\Models\DeliverySlot;
use App\Models\ContactMessage;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use App\Models\BlogComment;
use App\Models\RazorpayPayment;
use App\Models\Flutterwave;
use App\Models\SeoSetting;
use App\Models\TermsAndCondition;
use App\Models\Wishlist;
use App\Models\BlogTranslate;
use Validator;
use Auth, Str, URL, Mail;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Mail\SubscriptionVerification;
use App\Models\Language;
use App\Models\Reservation;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    public function setLanguage($lang_code)
    {
        $language = Language::where('lang_code', $lang_code)->first();
        Session::put('front_lang', $lang_code);
        Session::put('front_lang_name', $language->name);
        app()->setLocale($lang_code);

        $notification = trans('translate.Language switched successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function index()
    {

        
        $data['setting'] =  Setting::first();

        if ($data['setting']->theam == 0) {
            if (!Session::has('selected_theme')) {
                if ($data['setting']->theam == 1) {
                    Session::put('selected_theme', 'theme_one');
                } elseif ($data['setting']->theam == 2) {
                    Session::put('selected_theme', 'theme_two');
                } else {
                    Session::put('selected_theme', 'theme_one');
                }
            }
        } else {
            if ($data['setting']->theam == 1) {
                Session::put('selected_theme', 'theme_one');
            } elseif ($data['setting']->theam == 2) {
                Session::put('selected_theme', 'theme_two');
            } else {
                Session::put('selected_theme', 'theme_one');
            }
        }


        if (Session::get('selected_theme') == 'theme_one') {
            $seo_setting =  SeoSetting::where('id', 1)->first();
            $slider = Slider::first();
            $categories = Category::where('status', 'active')->take(10)->orderBy('position', 'ASC')->get();
            $Allcategories  = Category::where('status', 'active')->orderBy('position', 'ASC')->get();
            $promotions = Partner::orderBy('id', 'DESC')->get();
            $crafting =  CraftingProcess::first();
            $testimonials =  Testimonial::where('status', 'active')->paginate(10);
            $blogs = Blog::where('status', 'active')->get();
            $section =  SectionTitel::first();
            $contactus = ContactPage::with('translate_contactus')->first();
            $products = Product::where('status', 'active')->get();
            return view('Frontend.Pages.index2', [
                'contactus'   => $contactus , 
                'blogs'   => $blogs , 
                'testimonials'   => $testimonials , 
                'crafting'   => $crafting , 
              
                'data'   => $data , 
                'products' => $products,
                'seo_setting' => $seo_setting,
                'section' => $section,
                'Allcategories' => $Allcategories,
                'slider ' => $slider ,
                'categories ' => $categories ,
                'promotions ' => $promotions 
            ]);
        } elseif (Session::get('selected_theme') == 'theme_two') {
            $data['seo_setting'] =  SeoSetting::where('id', 1)->first();
            $data['slider'] = Slider::first();
            $data['categories'] = Category::where('status', 'active')->take(10)->get();
            $data['Allcategories'] = Category::where('status', 'active')->get();
            $data['product'] = Product::where('status', 'active')->take(15)->get();
            $data['product2'] = Product::where('status', 'active')->take(8)->get();
            $data['product3'] = Product::where('status', 'active')->take(6)->get();
            $data['promotions'] = Partner::orderBy('id', 'DESC')->get();
            $data['crafting'] =  CraftingProcess::first();
            $data['faqs'] =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
            $data['faqAbout'] =  FaqImages::first();
            $data['testimonials'] =  Testimonial::where('status', 'active')->paginate(10);
            $data['blogs'] = Blog::where('status', 'active')->get();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            $data['contactus'] = ContactPage::with('translate_contactus')->first();

            return view('Frontend.Pages.index', $data);
        } else {
            $seo_setting =  SeoSetting::where('id', 1)->first();
            $slider = Slider::first();
            $categories = Category::where('status', 'active')->take(10)->get();
            $Allcategories = Category::where('status', 'active')->orderBy('position', 'ASC')->get();
            // $product = Product::where('status', 'active')->take(15)->get();
            $products = Product::where('status', 'active')->get();
            $product3 = Product::where('status', 'active')->take(6)->get();
            $promotions = Partner::orderBy('id', 'DESC')->get();
            $crafting =  CraftingProcess::first();
            $faqs =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
            $faqAbout =  FaqImages::first();
            $testimonials =  Testimonial::where('status', 'active')->paginate(10);
            $blogs = Blog::where('status', 'active')->get();
            $app =  MobileApp::first();
            $section =  SectionTitel::first();
            $contactus = ContactPage::with('translate_contactus')->first();

            return view('Frontend.Pages.index2', [
                'contactus'   => $contactus , 
                'blogs'   => $blogs , 
                'testimonials'   => $testimonials , 
                'crafting'   => $crafting ,  
                'data'   => $data , 
                'products' => $products,
                'seo_setting' => $seo_setting,
                'section' => $section,
                'Allcategories' => $Allcategories,
                'slider ' => $slider ,
                'categories ' => $categories ,
                'promotions ' => $promotions 
            ]);
        }
    }

    public function menu(Request $request)
    {
        $data['seo_setting'] =  SeoSetting::where('id', 2)->first();
        $data['setting'] =  Setting::first();
        $data['products'] = Product::with('cat_name')->where('status', 'active')->get();
        // Use paginate directly on the query
        // $data['products'] = $productsQuery->appends($request->all());
        $data['section'] =  SectionTitel::first();
        $data['product2'] = Product::where('status', 'active')->get();
        $data['Allcategories'] = Category::where('status', 'active')->orderBy('position', 'ASC')->get();
        $data['contactus'] = ContactPage::with('translate_contactus')->first();
        return view('Frontend.Pages.menu', $data);
    }
    public function filterMenu(Request $request)
    {
        $productsQuery = Product::with('cat_name')->where('status', 'active');

        if ($request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }

        if ($request->keyword) {
            $productsQuery->whereHas('product_translate_lang', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('long_description', 'like', '%' . $request->keyword . '%');
            });
        }

        $products = $productsQuery->paginate(20)->appends($request->all());

        return response()->json($products);
    }



    public function menuDetils($slug)
    {
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['product'] = Product::where('status', 'active')->where('slug', $slug)->first();
        $data['galleries'] = ProductGallery::orderBy('id', 'DESC')->where('product_id', $data['product']->id)->get();
        $data['promotions'] = Partner::orderBy('id', 'DESC')->paginate(4);
        $data['reviews'] = Review::where('status', 1)->where('product_id', $data['product']->id)->orderBy('id', 'DESC')->get();
        $data['setting'] =  Setting::first();
        return view('Frontend.Pages.manu_detils', $data);
    }

    public function about()
    {
        $data['seo_setting'] =  SeoSetting::where('id', 3)->first();
        $data['setting'] =  Setting::first();
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['faqs'] =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        $data['faqAbout'] =  FaqImages::first();
        $data['testimonials'] =  Testimonial::where('status', 'active')->get();
        $data['product'] = Product::where('status', 'active')->where('is_populer', 1)->get();

        $data['crafting'] =  CraftingProcess::first();
        $data['about_us'] =  AboutUs::first();
        $data['contactus'] = ContactPage::with('translate_contactus')->first();

        return view('Frontend.Pages.about', $data);
    }

    public function contact()
    {
        $data['seo_setting'] =  SeoSetting::where('id', 6)->first();
        $data['setting'] =  Setting::first();
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['faqs'] =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        $data['faqAbout'] =  FaqImages::first();
        $data['contactus'] = ContactPage::first();
        return view('Frontend.Pages.contact', $data);
    }

    public function blog(Request $request)
    {
        $data['seo_setting'] =  SeoSetting::where('id', 9)->first();
        $data['setting'] =  Setting::first();
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['faqs'] =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        $data['faqAbout'] =  FaqImages::first();
        $blogs = Blog::where('status', 'active');

        if ($request->keyword) {
            $blogs = $blogs->whereHas('blog_translate_lang', function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        $blogs = $blogs->paginate(12);
        $data['blogs'] = $blogs->append($request->all());

        return view('Frontend.Pages.blog', $data);
    }

    public function blogDetils($slug)
    {
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['faqs'] =  Faq::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        $data['faqAbout'] =  FaqImages::first();
        $data['blog'] = Blog::where('status', 'active')->where('slug', $slug)->first();
        $data['blogs'] =  Blog::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        $data['promotions'] = Partner::orderBy('id', 'DESC')->orderBy('id', 'DESC')->paginate(4);
        $data['comment'] = BlogComment::where('status', 1)->where('blog_id', $data['blog']->id)->orderBy('id', 'DESC')->get();
        $data['setting'] =  Setting::first();
        $data['contactus'] = ContactPage::with('translate_contactus')->first();
        return view('Frontend.Pages.blog_detils', $data);
    }

    public function wishList()
    {
        if (FacadesAuth::user()) {
            $data['seo_setting'] =  SeoSetting::where('id', 10)->first();
            $data['setting'] =  Setting::first();
            $data['app'] =  MobileApp::first();
            $data['section'] =  SectionTitel::first();
            if (auth()->check()) {
                $user_id = auth()->user()->id;
                $wishlistItems = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
                if (!empty($wishlistItems)) {
                    $data['product'] = Product::where('status', 'active')->whereIn('id', $wishlistItems)->get();
                } else {
                    $data['product'] = [];
                }
            } else {
                $data['product'] = [];
            }
            $data['contactus'] = ContactPage::with('translate_contactus')->first();
            return view('Frontend.Pages.wishlist', $data);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function cartList(Request $request)
    {
        $data['seo_setting'] =  SeoSetting::where('id', 11)->first();
        $data['setting'] =  Setting::first();
        $data['app'] =  MobileApp::first();
        $data['section'] =  SectionTitel::first();
        $data['cart'] = $request->session()->get('cart', []);
        $data['contactus'] = ContactPage::with('translate_contactus')->first();
        return view('Frontend.Pages.cart_detils', $data);
    }


    public function newsLatter(Request $request)
    {
        $rules = [
            'email' => 'required'
        ];
        $customMessages = [
            'email.required' => trans('translate.Email is required'),
        ];
        $this->validate($request, $rules, $customMessages);
        if (Subscriber::where('email', $request->email)->first()) {
            $message = trans('translate.Email already subscribed');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = Str::random(50);
            $subscriber->save();


            $domain = URL::to('/');
            $verify_link = $domain . '/newsletter/verify/email?token=' . $subscriber->verified_token . '&email=' . $subscriber->email;
            $verify_link = '<a href="' . $verify_link . '">' . $verify_link . '</a>';

            MailHelper::setMailConfig();

            $template = EmailTemplate::where('id', 3)->first();
            $subject = $template->subject;
            $message = $template->description;
            $message = str_replace('{{verify_link}}', $verify_link, $message);
            Mail::to($subscriber->email)->send(new SubscriptionVerification($message, $subject));

            $message = trans('translate.A varification link has been send to your mail please verify the mail');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function newsletter_verify_email(Request $request)
    {

        $subscriber = Subscriber::where(['email' => $request->email, 'verified_token' => $request->token])->first();
        if ($subscriber) {
            $subscriber->is_verified = 1;
            $subscriber->verified_token = null;
            $subscriber->save();

            $message = trans('translate.Newsletter varification successful');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->route('index')->with($notification);
        } else {
            $message = trans('translate.Something went wrong');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('index')->with($notification);
        }
    }

    public function reservationMessage(Request $request)
    {
        $rules = [
            'date' => 'required',
            'time' => 'required',
            'email' => 'required',
            'details' => 'required',
            'phone' => 'required',
        ];
        $customMessages = [
            'date.required' => trans('Date is required'),
            'time.required' =>  trans('Time is required'),
            'email.required' => trans('Email is required'),
            'details.required' => trans('Detail is required'),
            'phone.required' => trans('Phone is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $msg = new Reservation();
        $msg->date = $request->date;
        $msg->time = $request->time;
        $msg->email = $request->email;
        $msg->details = $request->details;
        $msg->phone = $request->phone;
        $msg->save();

        $message = trans('Reservation Submit successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function contactMessage(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
            'email.required' =>  trans('translate.Email is required'),
            'phone.required' => trans('translate.Phone is required'),
            'subject.required' => trans('translate.Subject is required'),
            'message.required' => trans('translate.Message is required')
        ];

        $this->validate($request, $rules, $customMessages);

        $msg = new ContactMessage();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->phone = $request->phone;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();

        $message = trans('translate.Message send successfully');
        $notification = array('message' => $message, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function ProductReview(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'product_id' => 'required',
            'review' => 'required',
            'rating' => 'required',
        ]);

        if (auth()->check()) {
            if ($validate->fails()) {
                $message = trans('translate.Please fill up the form');
                $notification = array('message' => $message, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }

            $review = new Review();
            $review->product_id = $request->product_id;
            $review->user_id = Auth::user()->id;
            $review->review = $request->review;
            $review->rating = $request->rating;
            $review->status = 0;
            $review->save();

            $message = trans('translate.Review submited successful');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }


    public function blogComment(Request $request)
    {

        $rules = [
            'blog_id' => 'required',
            'comment' => 'required',
        ];
        $customMessages = [
            'comment.required' => trans('translate.Comment is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        if (auth()->check()) {

            $comment = new BlogComment();
            $comment->blog_id = $request->blog_id;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->status = 0;
            $comment->save();

            $message = trans('translate.Comment has been saved');
            $notification = array('message' => $message, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $message = trans('translate.Please login first');
            $notification = array('message' => $message, 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }


    public function tremsOfServices()
    {
        $data['trems_condation'] = TermsAndCondition::with('termsandcondition_translate')->first();
        $data['contactus'] = ContactPage::with('translate_contactus')->first();
        return view('Frontend.Pages.terms_of_services', $data);
    }

    public function privacyPolicy()
    {
        $data['privecy'] = TermsAndCondition::with('termsandcondition_translate')->first();
        $data['contactus'] = ContactPage::with('translate_contactus')->first();
        return view('Frontend.Pages.privacy_policy', $data);
    }
    public function getAvailableSlots(Request $request)
    {
        $selectedDate = $request->input('delevery_day');
        $currentDate = Carbon::now('Europe/Dublin')->format('Y-m-d');
        $currentTime = Carbon::now('Europe/Dublin');

        // Fetch slots dynamically
        $slots = TimeSlot::all(); // Adjust this query as needed

        $availableSlots = [];

        foreach ($slots as $slot) {
            $startTime = explode(' - ', $slot->slot)[0];
            $slotTime = Carbon::createFromFormat('h:i A', trim($startTime), 'Europe/Dublin');

            // Filter slots if today
            if ($selectedDate > $currentDate || $slotTime->greaterThan($currentTime)) {
                $availableSlots[] = [
                    'id' => $slot->id,
                    'slot' => $slot->slot
                ];
            }
        }

        return response()->json($availableSlots);
    
    }
}
