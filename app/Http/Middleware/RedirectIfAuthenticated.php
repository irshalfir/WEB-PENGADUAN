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
            // return redirect()->route('dashboard');
            if (Auth::user()->level == 'petugas') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('laporan.index');
            }
        }

        return $next($request);
    }
}
