
<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\Admin\AdminOrderController;
use App\Http\Controllers\WEB\Admin\SettingsController;
use App\Http\Controllers\WEB\Admin\TermsConditionController;
use App\Http\Controllers\WEB\Admin\AdminMessageController;
use App\Http\Controllers\WEB\Auth\AdminLoginController;
use App\Http\Controllers\WEB\Admin\DashboardController;
use App\Http\Controllers\WEB\Admin\CustomersController;
use App\Http\Controllers\WEB\Admin\CountryController;
use App\Http\Controllers\WEB\Admin\StateController;
use App\Http\Controllers\WEB\Admin\CityController;
use App\Http\Controllers\WEB\Admin\GalleryController;
use App\Http\Controllers\WEB\Admin\SubscriberController;
use App\Http\Controllers\WEB\Admin\TestimonialController;
use App\Http\Controllers\WEB\Admin\LanguageController;
use App\Http\Controllers\WEB\Admin\FAQController;
use App\Http\Controllers\WEB\Admin\ContactUsController;
use App\Http\Controllers\WEB\Admin\SliderController;
use App\Http\Controllers\WEB\Admin\AdminProfileController;
use App\Http\Controllers\WEB\Admin\FooterController;
use App\Http\Controllers\WEB\Admin\FooterSocialLinkController;
use App\Http\Controllers\WEB\Admin\AboutUsController;
use App\Http\Controllers\WEB\Admin\FrontendLanguageController;
use App\Http\Controllers\WEB\Admin\PrivecyController;
use App\Http\Controllers\WEB\Admin\SEOSetupController;
use App\Http\Controllers\WEB\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\WEB\Admin\EmailConfigController;
use App\Http\Controllers\WEB\User\Auth\LoginController;
use App\Http\Controllers\WEB\Admin\CategoryController;
use App\Http\Controllers\WEB\Admin\OptionalItemController;
use App\Http\Controllers\WEB\Admin\ProductController;
use App\Http\Controllers\WEB\Admin\BlogController;
use App\Http\Controllers\WEB\Admin\BlogCategoryController;
use App\Http\Controllers\WEB\Admin\FAQAboutController;
use App\Http\Controllers\WEB\Admin\MobileAppController;
use App\Http\Controllers\WEB\Admin\CraftingProcessController;
use App\Http\Controllers\WEB\Admin\PromotionController;
use App\Http\Controllers\WEB\Admin\SectionController;
use App\Http\Controllers\WEB\Admin\EmptyImageController;
use App\Http\Controllers\WEB\Admin\ProductReviewController;
use App\Http\Controllers\WEB\Admin\CouponController;
use App\Http\Controllers\WEB\Admin\ShippingController;
use App\Http\Controllers\WEB\Admin\TimeSlotController;
use App\Http\Controllers\WEB\Admin\OrderController;
use App\Http\Controllers\WEB\Admin\DeliveryAreaController;


use App\Http\Controllers\WEB\Auth\UserLoginController;
use App\Http\Controllers\WEB\Auth\ForgotPasswordController;

use App\Http\Controllers\WEB\User\DashboardController as UserDashboardController;

use App\Http\Controllers\WEB\Frontend\HomeController;
use App\Http\Controllers\WEB\Frontend\WishlistController;
use App\Http\Controllers\WEB\Frontend\CartController;
use App\Http\Controllers\WEB\Frontend\CheckoutController;
use App\Http\Controllers\WEB\Frontend\PaymentController;

use App\Models\setting as Setting;

Route::group(['middleware' => ['XSS']], function () {

    Route::group(['middleware' => ['HtmlSpecialchars']], function () {
        // Frontend Pages Routes....
        Route::get('/lang/{lang_code}', [HomeController::class,'setLanguage'])->name('set.language');
        Route::get('/change/theme/{theme}', [CartController::class,'changeTheme'])->name('change.fontend.theme');
        Route::get('/', [HomeController::class,'index'])->name('index');
        Route::get('/menu', [HomeController::class,'menu'])->name('menu');
        Route::get('/menu/{slug}', [HomeController::class,'menuDetils'])->name('menu-detils');
        Route::get('/about-us', [HomeController::class,'about'])->name('about');
        Route::get('/contact-us', [HomeController::class,'contact'])->name('contact');
        Route::get('/blog', [HomeController::class,'blog'])->name('blog');
        Route::get('/blog/{slug}', [HomeController::class,'blogDetils'])->name('blog-detils');
        Route::get('/wishlist', [HomeController::class,'wishList'])->name('wishlist');
        Route::get('/cartlist', [HomeController::class,'cartList'])->name('cartlist');
        Route::post('/newslatter', [HomeController::class,'newsLatter'])->name('newslatter');
        Route::get('/newsletter/verify/email', [HomeController::class,'newsletter_verify_email'])->name('newsletter.verify.email');
        Route::post('/reservation', [HomeController::class,'reservationMessage'])->name('reservation');
        Route::post('/contact/message', [HomeController::class,'contactMessage'])->name('contact.message');
        Route::post('/product/review', [HomeController::class,'ProductReview'])->name('product.review');
        Route::post('/blog/comment', [HomeController::class,'blogComment'])->name('user.blog.comment');
        Route::get('/search', [HomeController::class,'search'])->name('search');
        Route::get('/blog-search', [HomeController::class,'blogSearch'])->name('blog.search');
        Route::get('/terms-of-service', [HomeController::class,'tremsOfServices'])->name('trems.of.service');
        Route::get('/privacy-policy', [HomeController::class,'privacyPolicy'])->name('privacy.policy');

        Route::get('/cart-view', [CartController::class,'view'])->name('wishlist.index');
        Route::get('/add-to-cart/{product}', [CartController::class,'addToCart'])->name('cart.add');
        Route::post('/cart/add', [CartController::class,'addProduct'])->name('cart.add.detils');
        Route::get('/cart', [CartController::class,'index'])->name('cart.index');
        Route::get('/cart/remove/{product_id}', [CartController::class,'removeProduct'])->name('cart.remove');
        Route::get('/cart/increment/{product_id}', [CartController::class,'cartIncrement'])->name('cart.increment');
        Route::get('/cart/decrement/{product_id}', [CartController::class,'cartDecremet'])->name('cart.decrement');
        Route::post('/cart/update/{product_id}', [CartController::class,'cartUpdate'])->name('update.order.cart');

        Route::get('/wishlist/add', [WishlistController::class,'index'])->name('wishlist.index');
        Route::post('/wishlist/add/{product_id}',[WishlistController::class,'add'])->name('wishlist.add');
        Route::post('/wishlist/remove/{product_id}',[WishlistController::class,'remove']) ->name('wishlist.remove');
        Route::get('/wishlist/remover/{product_id}',[WishlistController::class,'removeR']) ->name('wishlist.removeR');

        Route::get('/checkout', [CheckoutController::class,'pickUp'])->name('checkout');
        // Route::get('/pickUp', [CheckoutController::class,'pickUp'])->name('pickup');
        Route::get('/inResturent', [CheckoutController::class,'inResturent'])->name('inresturent');
        Route::post('/process/order', [CheckoutController::class,'processOrder'])->name('process.order');
        Route::post('/apply-coupon', [CheckoutController::class,'applyCoupon'])->name('apply.coupon');
        Route::get('/select/payment/method', [CheckoutController::class,'selectPayment'])->name('select.payment.method');
        Route::post('/checkout/order', [CheckoutController::class,'checkOut'])->name('checkout.order');
        Route::get('/thank-you', [CheckoutController::class,'orderDetail'])->name('thank.you');
        Route::get('/order/management', [AdminLoginController::class,'orderLogin'])->name('order.login');
        Route::post('/order-manage', [AdminLoginController::class,'orderLoginL'])->name('admin.orderlogin');
        
        // User Login Routes.....
        Route::group(['middleware'=>'guest'],function () {
            // Route::get('/login', [UserLoginController::class,'index'])->name('login');
            Route::post('/login', [UserLoginController::class,'login'])->name('login');
            Route::get('/verify/user/email', [UserLoginController::class,'verify_user_email'])->name('verify.user.email');
            Route::get('/register', [UserLoginController::class,'registerView'])->name('register');
            Route::post('/register', [UserLoginController::class,'register'])->name('register');
            Route::get('/forgot/password', [UserLoginController::class,'Forgot'])->name('forgot.password.user');
            Route::post('/forgot/password', [UserLoginController::class,'ForgotPassword'])->name('forgot.password.user');
            Route::post('/otp/check', [UserLoginController::class,'otpPassword'])->name('otp.check');
            Route::get('/reset/password', [UserLoginController::class,'ResetPassword'])->name('reset.password.user');
            Route::post('/set/password', [UserLoginController::class,'SetPassword'])->name('reset.password.user');
            Route::post('/set/email', [UserLoginController::class,'SetEmail'])->name('reset.email.user');
        });
        
        // User Page Routes
        Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
            Route::get('/logout', [UserLoginController::class, 'LogOut'])->name('logout');
            
            Route::get('/dashboard', [UserDashboardController::class, 'UserDashboard'])->name('user.dashboard');
            Route::get('/edit-profile', [UserDashboardController::class, 'UserProfile'])->name('user.edit.profile');
            Route::get('/address', [UserDashboardController::class, 'address'])->name('user.address');
            Route::get('/address/{id}', [UserDashboardController::class, 'addressEdit'])->name('user.address.edit');
            Route::post('/address/update/{id}', [UserDashboardController::class, 'addressUpdate'])->name('user.address.upadate');
            Route::post('/add/new/address', [UserDashboardController::class, 'addNewAddress'])->name('add.new.address');
            Route::get('/remove/address/{id}', [UserDashboardController::class, 'removeAddress'])->name('remove.address');
            Route::get('/order', [UserDashboardController::class, 'order'])->name('user.order');
            Route::get('/order/last/week', [UserDashboardController::class, 'orderWeekly'])->name('user.order.last.week');
            Route::get('/order/detils/{id}', [UserDashboardController::class, 'orderDetils'])->name('user.order.detils');
            Route::get('/wishlist', [UserDashboardController::class, 'wishlist'])->name('user.wishlist');
            // Route::get('/review', [UserDashboardController::class, 'review'])->name('user.review');
            Route::get('/cards', [UserDashboardController::class, 'cardIndex'])->name('user.card.index');
            Route::post('/cards/add', [UserDashboardController::class, 'cardStore'])->name('card.add.detils');
            Route::get('/card/delete/{id}', [UserDashboardController::class, 'cardDelete'])->name('user.card.delete');
            Route::get('/card/edit', [UserDashboardController::class, 'cardEdit'])->name('card.edit');
            Route::get('/change-password', [UserDashboardController::class, 'changePassword'])->name('user.change.password');
            Route::post('/profile/update/{id}', [UserDashboardController::class, 'UpdateProfile'])->name('user.update.profile');
            Route::post('/password/update', [UserDashboardController::class, 'ChnagePassword'])->name('user.update.password');

        });
        
        Route::get('/get-states', [UserDashboardController::class, 'getStates']);
        Route::get('/get-cities', [UserDashboardController::class, 'getCities']);
        
        Route::get('/admin', [AdminLoginController::class,'index'])->name('admin.login.index');
        Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login.index');
        Route::post('/admin/login', [AdminLoginController::class,'Login'])->name('admin.login');
        Route::get('/login-out', [AdminLoginController::class,'Logout'])->name('admin.logout');
        Route::get('/order/login-out', [AdminLoginController::class,'orderLogout'])->name('order.logout');

        Route::get('/forgot-password-index', [ForgotPasswordController::class,'index'])->name('forgot.password');
        Route::post('/forgot-password', [ForgotPasswordController::class,'ForgotPassword'])->name('admin.forgot.password');
        Route::get('/reset-password', [ForgotPasswordController::class,'ResetPassword'])->name('admin.reset.password');
        Route::post('/set-password', [ForgotPasswordController::class,'SetPassword'])->name('reset.password');

        //................Payment.............//

        Route::get('/pay-with-cash', [PaymentController::class, 'payWithCash'])->name('cashPay');
        Route::get('/paypal', [PaymentController::class, 'payWithpaypal'])->name('paypal');
        Route::get('/paypal-payment-success-for-product', [PaymentController::class, 'paypalPaymentSuccess'])->name('paypal-payment-success');
        Route::get('/paypal-payment-cancled-for-product', [PaymentController::class, 'paypalPaymentCancled'])->name('paypal-payment-cancled');
        Route::get('/status', [PaymentController::class, 'getPaymentStatus'])->name('status');

        //...........................Stripe....................//
        Route::post('/pay-with-stripe', [PaymentController::class, 'payWithStripe'])->name('pay-with-stripe');

        //..................Razorpay Payment........................//
        Route::post('/razorpay-payment', [PaymentController::class, 'payWithRazorpay'])->name('pay-with-razorpay');

        //..................Flutterwave Payment........................//
        Route::post('/pay-with-flutterwave', [PaymentController::class, 'paywithFlutterwave'])->name('pay-with-flutterwave');

        //..................Paystack Payment........................//
        Route::post('/paystack-payment', [PaymentController::class, 'paywithPaystack'])->name('pay-with-paystack');

        //..................Instamojo Payment........................//
        Route::get('/instamojo-payment', [PaymentController::class, 'paywithInstamojo'])->name('pay-with-instamojo');
        Route::get('/response-instamojo', [PaymentController::class, 'instamojoResponse'])->name('response-instamojo');

        Route::get('/pay-with-mollie', [PaymentController::class, 'payWithMollie'])->name('pay-with-mollie');
        Route::get('/mollie-payment-success', [PaymentController::class, 'molliePaymentSuccess'])->name('mollie-payment-success');

        Route::post('/bank-payment', [PaymentController::class, 'bankPayment'])->name('bank-payment');

    });

    Route::group(['middleware' =>'admin'], function () {

        Route::get('/admin-dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

        //***************** Order Route ***************************
        Route::get('/all/order',[OrderController::class,'allOrder'])->name('all.order');
        Route::get('/pre/order',[OrderController::class,'preOrder'])->name('pre-order');
        Route::get('/delivery/order',[OrderController::class,'deliveryOrder'])->name('delivery.order');
        Route::get('/pickup/order',[OrderController::class,'pickupOrder'])->name('pickup.order');
        Route::get('/inresturent/order',[OrderController::class,'inresturentOrder'])->name('inresturent.order');
        Route::get('/order/detils/{id}',[OrderController::class,'OrderDetils'])->name('order.detils');
        Route::get('/order/delete/{id}',[OrderController::class,'OrderDelete'])->name('order.delete');
        Route::post('/order/change/{id}',[OrderController::class,'OrderChange'])->name('order.change');
        Route::get('/invoice/{id}',[OrderController::class,'show'])->name('show');
        Route::post('/invoices/{id}/print',[OrderController::class,'handlePrint']);
        Route::get('/order-management',[OrderController::class,'orderManagement'])->name('order.management');
        Route::get('/report',[OrderController::class,'orderReport'])->name('order.report');
        Route::post('/new-orders',[OrderController::class,'newOrders'])->name('order.new');
        Route::post('/old-orders',[OrderController::class,'oldOrders'])->name('order.new');
        Route::post('/load-invoice',[OrderController::class,'orderInvoice'])->name('order.invoice');
        Route::get('/play-bell',[OrderController::class,'playBell'])->name('order.ring');
        Route::post('/decline-order',[OrderController::class,'declineOrder'])->name('order.decline');
        Route::post('/accept-order',[OrderController::class,'acceptOrder'])->name('order.accept');

        Route::post('/order-report',[OrderController::class,'orderReports'])->name('order.reports');
        Route::get('/new-orders',[OrderController::class,'countNewOrders'])->name('order.count');
        Route::get('/order-delete',[OrderController::class,'orderDestroy'])->name('order.destroy');
        //***************** Category Route ***************************
        Route::get('/category-list',[CategoryController::class,'index'])->name('categories');
        Route::get('/category-create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/category-add',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('category-edit');
        Route::post('/category-update/{id}',[CategoryController::class,'updateCategory'])->name('category-update');
        Route::get('/change/status/{id}',[CategoryController::class,'Status'])->name('admin.category.status.change');
        Route::get('/category-destroy/{id}',[CategoryController::class,'delete'])->name('category-destroy');
        Route::get('/category-language-edit/{categoryId}/{langCode}',[CategoryController::class,'editLanguage'])->name('category.language.edit');
        Route::post('/category-language-edit/{id}',[CategoryController::class,'updateLanguage'])->name('category.language_update');
        //***************** Role Route ***************************
        Route::get('/role-list',[RoleController::class,'index'])->name('roles');
        Route::get('/role-create',[RoleController::class,'create'])->name('role.create');
        Route::post('/role-add',[RoleController::class,'store'])->name('role.store');
        Route::get('/edit-role/{id}',[RoleController::class,'editRole'])->name('role-edit');
        Route::post('/role-update/{id}',[RoleController::class,'updateRole'])->name('role-update');
        Route::get('/role-destroy/{id}',[RoleController::class,'delete'])->name('role-destroy');
        

        //***************** Optional Route ***************************
        Route::get('/optional-item-list',[OptionalItemController::class,'index'])->name('optional.item');
        Route::get('/optional-item-create',[OptionalItemController::class,'create'])->name('optional.item.create');
        Route::post('/optional-item-add',[OptionalItemController::class,'store'])->name('optional.item.store');
        Route::get('/edit-optional-item/{id}',[OptionalItemController::class,'edit'])->name('optional.item.edit');
        Route::post('/optional-item-update/{id}',[OptionalItemController::class,'update'])->name('optional.item.update');
        Route::get('/change-optional-items-status/{id}',[OptionalItemController::class,'Status'])->name('optional.item.status.change');
        Route::get('/optional-item-destroy/{id}',[OptionalItemController::class,'delete'])->name('optional.item.destroy');
        Route::get('/optional-item-language-edit/{itemId}/{langCode}',[OptionalItemController::class,'editLanguage'])->name('optional.item.language.edit');
        Route::post('/optional-item-language-edit/{id}',[OptionalItemController::class,'updateLanguage'])->name('optional.item.language.update');

        //***************** Product Route ***************************
        Route::get('/product-list-show',[ProductController::class,'index'])->name('product.list.show');
        Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
        Route::post('/product-add',[ProductController::class,'store'])->name('product.store');
        Route::get('/edit-product-item/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/product-item-update/{id}',[ProductController::class,'update'])->name('product.item.update');
        Route::get('/change-product-items-status/{id}',[ProductController::class,'Status'])->name('product.item.status.change');
        Route::get('/product-item-destroy/{id}',[ProductController::class,'delete'])->name('product.destroy');
        Route::get('/product-item-language-edit/{itemId}/{langCode}',[ProductController::class,'editLanguage'])->name('product.item.language.edit');
        Route::post('/product-item-language-edit/{id}',[ProductController::class,'updateLanguage'])->name('product.item.language.update');

            //***************** Product Gallery Route ***************************
        Route::get('/product-gallery/{id}',[ProductController::class,'GalleryView'])->name('product.gallery');
        Route::post('/product-gallery-store/{id}',[ProductController::class,'GalleryStore'])->name('product.gallery.store');
        Route::get('/product-gallery-destroy/{id}',[ProductController::class,'GalleryDelete'])->name('product.gallery.destroy');

        //*************** Blog Category Route **********
        Route::get('/blog-categories',[BlogCategoryController::class,'index'])->name('blog-categories');
        Route::get('/blog-category-create',[BlogCategoryController::class,'create'])->name('blog-category.create');
        Route::post('/admin-blog-category-add',[BlogCategoryController::class,'store'])->name('blog-category.store');
        Route::get('blog-category-edit/{id}',[BlogCategoryController::class,'edit'])->name('blog-category.edit');
        Route::post('blog-category-update/{id}',[BlogCategoryController::class,'update'])->name('blog-category.update');
        Route::get('/blog-category-destroy/{id}',[BlogCategoryController::class,'delete'])->name('blog-category.destroy');
        Route::get('blog-category-edit-language/{blogCategoryId}/{langCode}',[BlogCategoryController::class,'editLanguage'])->name('blog-category.language.edit');
        Route::post('blog-category-update-language/{id}',[BlogCategoryController::class,'updateLanguage'])->name('blog-category.language_update');
        Route::get('blog-category-status-update/{id}',[BlogCategoryController::class,'UpdateStatus'])->name('update.status.blog.category');

        //*************** Blog Route **********
        Route::get('/blog-status-chnage/{id}',[BlogController::class,'Status'])->name('blog.status.change');
        Route::get('/blog-destroy/{id}',[BlogController::class,'delete'])->name('blog-delete');
        Route::get('/eidt-blog-language/{blogId}/{langCode}',[BlogController::class,'editLanguage'])->name('blogs.language.edit');
        Route::post('blog-update/{id}',[BlogController::class,'updateLanguage'])->name('blogs.language_update');
        Route::resource('blogs',BlogController::class);

        Route::get('/blog-comment',[BlogController::class,'blogComment'])->name('blog.comment');
        Route::get('blog/change/status/{id}',[BlogController::class,'changeBlogStatus'])->name('blog.change.status');
        Route::get('/blog/delete/{id}',[BlogController::class,'blogDelete'])->name('blog.comment.delete');

        //*************** Country Route **********
        Route::get('country-status/{id}',[CountryController::class,'Status'])->name('country-status');
        Route::get('/country-language/{countryId}/{langCode}',[CountryController::class,'editLanguage'])->name('country.language.edit');
        Route::post('country-language-update/{id}',[CountryController::class,'updateLanguage'])->name('country.language_update');
        Route::get('/county-delete/{id}',[CountryController::class,'delete'])->name('country.delete');
        Route::resource('countries',CountryController::class);

        //*************** State Route **********
        Route::get('state-status/{id}',[StateController::class,'Status'])->name('state-status');
        Route::get('/state-language-edit/{stateId}/{langCode}',[StateController::class,'editLanguage'])->name('state.language.edit');
        Route::post('state-language-update/{id}',[StateController::class,'updateLanguage'])->name('state.language_update');
        Route::get('/state-delete/{id}',[StateController::class,'delete'])->name('state.delete');
        Route::resource('states',StateController::class);

        //*************** City Route **********
        Route::get('/city-status-update/{id}',[CityController::class,'UpdateCityStatus'])->name('city.status.update');
        Route::get('/city-language-edit/{cityId}/{langCode}',[CityController::class,'editLanguage'])->name('city.language.edit');
        Route::post('city-language-update/{id}',[CityController::class,'updateLanguage'])->name('city.language_update');
        Route::get('/city-delete/{id}',[CityController::class,'delete'])->name('cities.delete');
        Route::resource('cities',CityController::class);

        // ************* FAQ Route************
        Route::get('/chnage-status/{id}',[FAQController::class,'ChangeStatus'])->name('faq.status.change');
        Route::get('/faq-language-edit/{faqId}/{langCode}',[FAQController::class,'editLanguage'])->name('faq.language.edit');
        Route::post('faq-language-update/{id}',[FAQController::class,'updateLanguage'])->name('faq.language_update');
        Route::get('faq-delete/{id}',[FAQController::class,'delete'])->name('faq.delete');
        Route::resource('faqs',FAQController::class);

        // ************* FAQ Route************
        Route::get('/chnage-status/{id}',[FAQController::class,'ChangeStatus'])->name('faq.status.change');
        Route::get('/faq-language-edit/{faqId}/{langCode}',[FAQController::class,'editLanguage'])->name('faq.language.edit');
        Route::post('faq-language-update/{id}',[FAQController::class,'updateLanguage'])->name('faq.language_update');

        //*************** Faq About Route **********
        Route::get('faq-about-language/edit/{langCode}',[FAQAboutController::class,'editLanguage'])->name('faq.about.language.edit');
        Route::post('faq-about-language-update/{id}',[FAQAboutController::class,'updateLanguage'])->name('faq.about.language-update');
        Route::get('faq-about',[FAQAboutController::class,'index'])->name('faq.about.index');
        Route::post('faq-about-update/{id}',[FAQAboutController::class,'update'])->name('faq.about.update');

        //*************** Mobile App Route **********
        Route::get('mobile-app-language/edit/{langCode}',[MobileAppController::class,'editLanguage'])->name('mobile.app.language.edit');
        Route::post('mobile-app-language-update/{id}',[MobileAppController::class,'updateLanguage'])->name('mobile.app.language-update');
        Route::get('mobile-app',[MobileAppController::class,'index'])->name('mobile.app.index');
        Route::post('mobile-app-update/{id}',[MobileAppController::class,'update'])->name('mobile.app.update');

        // ************* Crafting Process Route************
        Route::get('crafting-language/edit/{langCode}',[CraftingProcessController::class,'editLanguage'])->name('crafting.language.edit');
        Route::post('crafting-language-update/{id}',[CraftingProcessController::class,'updateLanguage'])->name('crafting.language-update');
        Route::get('crafting',[CraftingProcessController::class,'index'])->name('crafting.index');
        Route::post('crafting-update/{id}',[CraftingProcessController::class,'update'])->name('crafting.update');

        //***************Product Promotion Route **********
        Route::get('promotion-product-delete/{id}',[PromotionController::class,'delete'])->name('promotion.product.delete');
        Route::resource('promotion',PromotionController::class);

        //*************** Footer Payment Method Images Route **********
        Route::get('gallery-delete/{id}',[GalleryController::class,'delete'])->name('gallery.delete');
        Route::resource('galleries',GalleryController::class);

        //*************** Footer Route **********
        Route::get('footer-language/edit/{langCode}',[FooterController::class,'editLanguage'])->name('footer.language.edit');
        Route::post('footer-language-update/{id}',[FooterController::class,'updateLanguage'])->name('footer.language-update');
        Route::get('footer',[FooterController::class,'index'])->name('footer.index');
        Route::post('footer-update/{id}',[FooterController::class,'update'])->name('footer.update');

        //*************** Footer Social Link Route **********
        Route::resource('FooterSocialLink',FooterSocialLinkController::class);

        // ************* Section Titel Route************
        Route::get('section-title/edit/{langCode}',[SectionController::class,'editLanguage'])->name('section.title.language.edit');
        Route::post('section-title-language-update/{id}',[SectionController::class,'updateLanguage'])->name('section.title.language-update');
        Route::get('section-title',[SectionController::class,'index'])->name('section.title.index');
        Route::post('section-title-update/{id}',[SectionController::class,'update'])->name('section.title.update');

        Route::resource('EmptyImage',EmptyImageController::class);
        Route::get('not-found-image',[EmptyImageController::class, 'not_found_image'])->name('admin.not-found-image');
        Route::put('not-found-image-update',[EmptyImageController::class, 'update_not_found_image'])->name('admin.update-not-found-image');

        // Contact Message Routes.....
        Route::get('/message',[AdminMessageController::class,'index'])->name('admin.message.index');
        Route::get('/message-delete/{id}',[AdminMessageController::class,'deleteMessage'])->name('delete.message');

        // Subscriber Routes.....
        Route::get('subscriber-status-chnage/{id}',[SubscriberController::class,'ChangeStatus'])->name('subscriber.change.status');
        Route::get('/subscriber-delete/{id}',[SubscriberController::class,'deleteSubscriber'])->name('subscriber.delete');
        Route::get('/Subscriber',[SubscriberController::class,'index'])->name('subscriber.index');

        // Product review routes.....
        Route::get('reviews/status/change/{id}', [ProductReviewController::class, 'changeReviewStatus'])->name('reviews.change.status');
        Route::get('/reviews-delete/{id}',[ProductReviewController::class,'deleteReviews'])->name('reviews.delete');
        Route::get('/reviews',[ProductReviewController::class,'index'])->name('reviews.index');

        //*************** Coupon Route **********
        Route::get('coupon-status-chnage/{id}',[CouponController::class,'ChangeStatus'])->name('coupon.change.status');
        Route::get('/coupon-delete/{id}',[CouponController::class,'delete'])->name('coupon.delete');
        Route::resource('coupon',CouponController::class);

        //*************** Delivery Area Route **********
        Route::get('deliveryarea-status-chnage/{id}',[DeliveryAreaController::class,'ChangeStatus'])->name('deliveryarea.change.status');
        Route::get('/deliveryarea-delete/{id}',[DeliveryAreaController::class,'delete'])->name('deliveryarea.delete');
        Route::resource('deliveryarea',DeliveryAreaController::class);

        //*************** Time Slot Route **********
        Route::get('timeslot-status-chnage/{id}',[TimeSlotController::class,'ChangeStatus'])->name('timeslot.change.status');
        Route::get('/timeslot-delete/{id}',[TimeSlotController::class,'delete'])->name('timeslot.delete');
        Route::resource('timeslot',TimeSlotController::class);

        //*************** Seo Setup Route **********
        Route::get('/seo-setup-index',[SEOSetupController::class,'index'])->name('admin.seo.setup.index');
        Route::post('seo-setup-update/{id}',[SEOSetupController::class,'SEOUpdate'])->name('page.seo.update');

        //*************** Language Route **********
        Route::get('/language-status/{id}',[LanguageController::class,'status'])->name('language-status');
        Route::get('/language-delete/{id}',[LanguageController::class,'delete'])->name('language.delete');
        Route::resource('languages',LanguageController::class);

        //***************Fontend Language Route **********
        Route::get('/fontend/language/{langCode}',[FrontendLanguageController::class,'index'])->name('fontend.language');
        Route::post('/fontend/language/update/{id}',[FrontendLanguageController::class,'update'])->name('fontend.language.update');

        //*************** Gallery Route **********
        Route::get('gallery-delete/{id}',[GalleryController::class,'delete'])->name('gallery.delete');
        Route::resource('galleries',GalleryController::class);

        //*************** Testmonial Route **********
        Route::get('/testimonials-status-update/{id}',[TestimonialController::class,'UpdateStatus'])->name('testimonial.status.update');
        Route::get('/testimonials-delete/{id}',[TestimonialController::class,'delete'])->name('testimonials.delete');
        Route::get('testimonial-edit-language/{testimonialId}/{langCode}',[TestimonialController::class,'editLanguage'])->name('testimonials.language.edit');
        Route::post('testimonial-update-language/{id}',[TestimonialController::class,'updateLanguage'])->name('testimonial.language-update');
        Route::resource('testimonials',TestimonialController::class);

        //*************** Terms and Policy Route **********
        Route::get('termsandcondition.language.edit/{langCode}',[TermsConditionController::class,'editLanguage'])->name('termsandcondition.language.edit');
        Route::post('termsandcondition.language-update/{id}',[TermsConditionController::class,'updateLanguage'])->name('termsandcondition.language-update');
        Route::get('/terms-and-condition',[TermsConditionController::class,'index'])->name('terms.and.conditions');
        Route::post('/terms-and-condition-update/{id}',[TermsConditionController::class,'TermsAndConditionsUpdate'])->name('terms.and.conditions.update');

        //*************** Privacy Route **********
        Route::get('privacy.language.edit/{langCode}',[PrivecyController::class,'editLanguage'])->name('privacy.language.edit');
        Route::post('privacy.language-update/{id}',[PrivecyController::class,'updateLanguage'])->name('privacy.language-update');
        Route::get('/Privecy-policy',[PrivecyController::class,'index'])->name('privecy.policy');
        Route::post('/privecy-update/{id}',[PrivecyController::class,'PrivecyUpdate'])->name('privecy.update');

        //*************** About us Route **********
        Route::get('about.language.edit/{langCode}',[AboutUsController::class,'editLanguage'])->name('about.language.edit');
        Route::post('about.language-update/{id}',[AboutUsController::class,'updateLanguage'])->name('about.language-update');
        Route::get('about-us-detils',[AboutUsController::class,'index'])->name('about-us.index');

        // ************* Contact-us Plan Route************
        Route::get('/contactus-language-edit/{langCode}',[ContactUsController::class,'editLanguage'])->name('contactus.language.edit');
        Route::post('contactus-plan-language-update/{id}',[ContactUsController::class,'updateLanguage'])->name('contactus.language.update');
        Route::get('edit-contactus',[ContactUsController::class,'edit'])->name('contactus-page.edit');
        Route::post('contactus-update',[ContactUsController::class,'update'])->name('contactus-page.update');

        // ************* Slider Route************
        Route::get('/slider-language-edit/{sliderId}/{langCode}',[SliderController::class,'editLanguage'])->name('slider.language.edit');
        Route::post('slider-language-update/{id}',[SliderController::class,'updateLanguage'])->name('slider.language-update');
        Route::get('slider-delete/{id}',[SliderController::class,'delete'])->name('slider.delete');
        Route::resource('slider',SliderController::class);

        Route::get('/customer-list',[CustomersController::class,'index'])->name('customer.list');
        Route::get('/customer-details/{id}',[CustomersController::class,'CustomerDetails'])->name('detils.customer');
        Route::get('/pending-customer-list',[CustomersController::class,'PendingCustomer'])->name('pending.customers');
        Route::get('/approve-customer/{id}',[CustomersController::class,'ApproveCustomer'])->name('admin.approve.user');
        Route::get('/delete-pending-customer/{id}',[CustomersController::class,'DeleteUserPendingUser'])->name('admin.delete.pending.user');

        Route::get('/order-list',[AdminOrderController::class,'index'])->name('order.list');
        Route::get('/pending-orders',[AdminOrderController::class,'PendingOrders'])->name('pending.orders');
        Route::get('/progress-orders',[AdminOrderController::class,'ProgressOrders'])->name('progress.orders');
        Route::get('/delivered-orders',[AdminOrderController::class,'DeliveredOrders'])->name('delivered.orders');
        Route::get('/completed-orders',[AdminOrderController::class,'CompletedOrders'])->name('completed.orders');
        Route::get('/order-details/{id}',[AdminOrderController::class,'OrderDetails'])->name('admin.order.details');
        Route::post('/order-status-update/{id}',[AdminOrderController::class,'OrderStatusUpdate'])->name('order.status.update');
        Route::get('delete-order/{id}',[AdminOrderController::class,'DeleteOrder'])->name('admin.order.delete');

        Route::get('/settings',[SettingsController::class,'index'])->name('settings');
        Route::post('/chnage-login-page-images',[SettingsController::class,'ChnageLoginPageImages'])->name('update.login.page.logo');
        Route::post('/admin-chnage-image/{id}',[SettingsController::class,'UpdateProfile'])->name('admin.update.profile');
        Route::get('/chnage-dark-mode-status',[SettingsController::class,'DarkModeStatus'])->name('dark.mode.status');
        Route::get('/get-dark-moode',[SettingsController::class,'getDarkMode'])->name('get.dark.option');
        Route::post('/admin-add-social-link',[SettingsController::class,'AddSocialLink'])->name('admin.create.social.link');
        Route::get('/delete-social-link/{id}',[SettingsController::class,'DeleteSocialLink'])->name('delete.social.account');
        Route::post('/general-setting/{id}',[SettingsController::class,'generalSetting'])->name('setting.theam.change');
        Route::post('/email-configaration',[SettingsController::class,'emailConfigaration'])->name('email.credential.update');
        Route::post('/google-recaptcha/update',[SettingsController::class,'updateGoogleRecaptcha'])->name('update-google-recaptcha');
        Route::post('/tawk-chat',[SettingsController::class,'updateTawkIo'])->name('update-tawk.io-live-chat');
        Route::post('/google-analytic/update',[SettingsController::class,'updateGoogleAnalytic'])->name('update-google-analytic');
        Route::post('/app-link-update/{id}',[SettingsController::class,'AppLinkUpdate'])->name('update.app.link');
        Route::get('/delete-login-activity/{id}',[SettingsController::class,'DeleteLoginActivity'])->name('delete.login.history');

        Route::resource('AboutUs',AboutUsController::class);

        Route::post('admin-chnage-password',[AdminProfileController::class,'ChnagePassword'])->name('admin.chnage.password');
        Route::resource('AdminProfile',AdminProfileController::class);

        Route::get('/user-about-us', function () {
            return view('User.AboutUs');
        })->name('user.about.us');

        Route::get('admin-payment',[AdminPaymentController::class,'index'])->name('admin.payment.index');
        Route::post('cash-credential-update',[AdminPaymentController::class,'cashCredentialUpdate'])->name('admin.cash.credential.update');
        Route::post('paypal-credential-update',[AdminPaymentController::class,'paypalCredentialUpdate'])->name('admin.paypal.credential.update');
        Route::post('stripe-credential-update',[AdminPaymentController::class,'StripeCredentialUpdate'])->name('admin.stripe.credential.update');
        Route::post('razorpay-credential-update',[AdminPaymentController::class,'updateRazorpay'])->name('admin.razorpay.credential.update');
        Route::post('flutterwave-credential-update',[AdminPaymentController::class,'updateFlattuerwave'])->name('admin.flutterwave.credential.update');
        Route::post('paystack-credential-update',[AdminPaymentController::class,'updatePaystack'])->name('admin.paystack.credential.update');
        Route::post('instamojo-credential-update',[AdminPaymentController::class,'updateInstamojo'])->name('admin.instamojo.credential.update');
        Route::post('bank-credential-update',[AdminPaymentController::class,'updateBank'])->name('admin.bank.credential.update');

        Route::get('email-template',[EmailConfigController::class,'EmailTemplateIndex'])->name('email-config.template.index');
        Route::post('email-template-update/{id}',[EmailConfigController::class,'EmailTemplateUpdate'])->name('email-config.template.update');
        Route::resource('email-config',EmailConfigController::class);

    });

});


Route::get('/migrate', function(){
    Artisan::call('migrate');

    $setting = Setting::first();
    $setting->app_version = '1.4';
    $setting->save();

    Artisan::call('optimize:clear');

    $notification = "You version has been updated successfully";
    $notification = array('messege' => $notification, 'alert-type' => 'success');
    return redirect()->route('index')->with($notification);
});

Route::get('/clear-cache', function () {
    // Clear route cache
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');

    $notification = "Cache cleared";
    $notification = array('messege' => $notification, 'alert-type' => 'success');
    return redirect()->route('index')->with($notification);
});
