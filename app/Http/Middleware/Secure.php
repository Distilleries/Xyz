<?php

namespace App\Http\Middleware;

use Closure;

class Secure extends \Distilleries\Expendable\Http\Middleware\Secure
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
        if ($request->headers->has('X_FORWARDED_PROTO')) {
            $https = $request->headers->get('X_FORWARDED_PROTO');
        } else {
            $https = $request->server->get('HTTPS');
        }

        if ((empty($https) or !(in_array(strtolower($https), array('https', 'on', 'ssl', '1')))) and strpos($request->getRequestUri(), '/storage/') === false and strpos($request->getRequestUri(), '/pulse') === false) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}