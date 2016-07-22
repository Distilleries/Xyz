<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;

class AuthenticateOnceWithBasicAuth extends AuthenticateWithBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (env('BASIC_AUTH', false) === true) {
            $authIps = env('BASIC_AUTH_IPS', '');
            $authIps = explode(',', $authIps);

            if (empty($authIps) or ! in_array($request->ip(),$authIps)) {
                return $this->auth->guard($guard)->basic() ?: $next($request);
            }
        }

        return $next($request);
    }
}