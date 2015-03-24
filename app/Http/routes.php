<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use \Route;

Route::get('/', 'HomeController@index');

Route::group(array('middleware' => 'auth'), function ()
{

    Route::group(array('before' => 'permission', 'prefix' => config('expendable::admin_base_uri')), function ()
    {
        Route::controller('post', 'Admin\PostController');
    });
});
