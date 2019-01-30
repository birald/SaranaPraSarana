<?php

namespace App\Http\Middleware;

use Closure;

class is_kasi
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
        if (!auth()->guard('kasi')->check()) {
            return redirect(url('/login_kasi'));
        }
        return $next($request);
    }
}
