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
Route::resource('locations', 'LocationController');

Route::resource('users', 'UserController');

Route::resource('events', 'EventController');

Route::get('/', "SiteController@showIndex");

//Standard application routes.
Route::get('login', 'SiteController@showLogin');
Route::post('login', 'SiteController@doLogin');
Route::get('logout', 'SiteController@doLogout');
Route::get('help', 'SiteController@showHelp');

//Forgotten password route.
Route::get('password/forgot', 'RemindersController@getRemind');
Route::post('password/remind', 'RemindersController@postRemind');
Route::post('password/reset', 'RemindersController@postReset');

//Administrative routes
Route::group(array('before'=>'auth'), function() {


});

App::missing(function($exception)  {
    return Response::json(array('status'=>404));
});