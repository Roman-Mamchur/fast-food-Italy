<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session, Config;
use App\Models\Language;

class LangSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::get('front_lang')){
            $default_lang = Language::where('id', 3)->first();
            Session::put('front_lang', $default_lang->lang_code);
            Session::put('front_lang_name', $default_lang->name);

            app()->setLocale($default_lang->lang_code);
        }else{
            $is_exist = Language::where('lang_code', Session::get('front_lang'))->first();
            if(!$is_exist){
                Session::put('front_lang', 'en');
                Session::put('front_lang_name', 'English');
            }

            app()->setLocale(Session::get('front_lang'));
        }

        return $next($request);
    }
}
