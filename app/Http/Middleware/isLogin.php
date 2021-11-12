<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // cek jika masih ada session -> redirect ke page orderlist

        if (Auth::check())
        {
            if (auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.orderlist');
            }
            elseif (auth()->user()->role == 'user')
            {
                return redirect()->route('user.orderlist');
            }
        }
        else
        {
            return $next($request);
        }
    }

}
