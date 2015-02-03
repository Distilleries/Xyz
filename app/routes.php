<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array(
    'prefix' => Config::get('backend.admin_base_uri'),
    'before' => 'admin.auth.redirect'
), function ()
{
    Route::get('', function ()
    {
        Redirect::to(route('login.index'));
    });

    Route::controller('login', 'Admin\LoginController', [
        'getIndex'  => 'login.index',
        'getRemind' => 'login.remind',
        'getLogout' => 'login.logout',
        'getReset'  => 'login.reset',
    ]);


});

Route::group(array('before' => 'admin.auth'), function ()
{

    Route::group(array('before' => 'auth.anthorized', 'prefix' => Config::get('backend.admin_base_uri')), function ()
    {
        Route::controller('user', 'Admin\UserController', [
            'getProfile' => 'user.profile'
        ]);
        Route::controller('email', 'Admin\EmailController');
        Route::controller('component', 'Admin\ComponentController');
        Route::controller('role', 'Admin\RoleController');
        Route::controller('service', 'Admin\ServiceController');
        Route::controller('permission', 'Admin\PermissionController');
        Route::controller('language', 'Admin\LanguageController');
    });
});


View::composer('admin.layout.default', function ($view)
{
    $user = Auth::administrator()->get();
    $view->with('title', '')
        ->with('user', $user);
});
