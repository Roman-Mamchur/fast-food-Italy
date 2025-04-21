<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\GoogleRecaptcha;
use App\Models\TawkChat;
use App\Models\GoogleAnalytic;
use Illuminate\Support\Facades\View;

use App\Models\shopping_cart;
use App\Models\Product;
use App\Models\EmailConfiguration;
use App\Models\Language;
use Auth;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (! $this->app->runningInConsole()) {
            $setting = Setting::first();
            $languages = Language::where('status','active')->get();
            $googleRecaptcha = GoogleRecaptcha::first();
            $tawk_chat = TawkChat::first();
            $googleAnalytic = GoogleAnalytic::first();
            View::share(compact('setting','googleRecaptcha','tawk_chat','googleAnalytic','languages'));
        }

    }
}
