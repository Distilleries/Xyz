<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];


    /**
     * Add the CSRF token to the response cookies.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response $response
     * @return \Illuminate\Http\Response
     */
    protected function addCookieToResponse($request, $response)
    {
        $config = config('session');
        $response->headers->setCookie(
            new Cookie(
                'XSRF-TOKEN', $request->session()->token(), time() + 60 * 120,
                '/', $config['domain'], $request->isSecure(), false
            )
        );

        return $response;
    }
}
