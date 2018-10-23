<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }else{
            // return redirect('/admin')->with(['flash_message'=>'danger','message'=>'Bạn phải đăng nhập để truy cập.']);
            return redirect()->action('AdminController@login')->with(['flash_message'=>'danger','message'=>'Bạn phải đăng nhập để truy cập.']);
        }

        return $next($request);
    }
}
