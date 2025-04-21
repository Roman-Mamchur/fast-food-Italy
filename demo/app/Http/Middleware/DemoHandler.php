<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Route;

class DemoHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Route::is('login') || Route::is('logout') || Route::is('admin.login') || Route::is('admin.logout') || Route::is('cart.add.detils') || Route::is('process.order')){
            return $next($request);
         }else{
            if(env('APP_MODE') == 'DEMO'){
                if($request->isMethod('post') || $request->isMethod('delete') || $request->isMethod('put') || $request->isMethod('patch')){

                    if ($request->ajax()) {
                        return response()->json(['message' => 'This Is Demo Version. You Can Not Change Anything'],403);
                    } else {

                        $notification = trans('This Is Demo Version. You Can Not Change Anything');
                        $notification=array('message'=>$notification,'alert-type'=>'error');
                        return redirect()->back()->with($notification);
                    }
                }
            }
         }
        return $next($request);
    }
}
