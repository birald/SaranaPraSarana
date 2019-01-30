<?php

namespace App\Http\Middleware;

use Closure;

class is_sekolah
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
        if (!auth()->guard('sekolah')->check()) {
            return redirect(url('/login_sekolah'));
        }
        return $next($request);
    }
}
