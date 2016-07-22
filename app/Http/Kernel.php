<?php

namespace App\Http;

use Distilleries\Expendable\Http\Kernel as BaseKernel;

class Kernel extends BaseKernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \App\Http\Middleware\Secure::class,
        \App\Http\Middleware\ResponseXFrameHeaderMiddleware::class,
        \App\Http\Middleware\OpCache::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'       => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \App\Http\Middleware\AuthenticateOnceWithBasicAuth::class,
        'guest'      => \Distilleries\Expendable\Http\Middleware\RedirectIfAuthenticated::class,
        'permission' => \Distilleries\PermissionUtil\Http\Middleware\CheckAccessPermission::class,
        'cache'      => \App\Http\Middleware\Cache::class,
        'language'   => \App\Http\Middleware\LanguageDetector::class,
    ];

    /**
     * Application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'auth',
            'permission',
        ],
        'web'   => [

        ]
    ];
}
