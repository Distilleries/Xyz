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


Route::group(array('before' => 'admin.auth'), function ()
{

    Route::group(array('before' => 'auth.anthorized', 'prefix' => Config::get('expendable::admin_base_uri')), function ()
    {
        Route::controller('country', 'Admin\CountryController');
    });
});
