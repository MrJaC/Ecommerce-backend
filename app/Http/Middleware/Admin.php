<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('admin');
        }
        if (Auth::user()->role == 2) {
            return redirect()->route('employee');
        }
        if (Auth::user()->role == 3) {
            return redirect()->route('customer');
        }
        if (Auth::user()->role == 4) {
            return redirect()->route('vendor');
        }

    }
}
