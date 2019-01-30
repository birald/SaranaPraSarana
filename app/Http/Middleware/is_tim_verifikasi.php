<?php

namespace App\Http\Middleware;

use Closure;

class is_tim_verifikasi
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
        if (!auth()->guard('tim_verifikasi')->check()) {
            return redirect(url('/login_tim_verifikasi'));
        }
        return $next($request);
    }
}
