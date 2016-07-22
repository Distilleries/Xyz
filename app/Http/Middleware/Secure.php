<?php

namespace App\Http\Middleware;

use Closure;

class Secure
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->isSecure() and env('SECURE_COOKIE', false)) {
            if (strpos($request->getRequestUri(), '/storage/') === false) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
