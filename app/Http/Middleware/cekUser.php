<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekUser {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // jika tidak login, maka pesan error 401
        if (!Auth::check())
        {
            return abort(401);
        }

        // jika yang login adalah admin
        if (Auth::user()->role == 'user')
        {
            return $next($request);
        }
        else
        {
            return abort(401);
        }
    }

}