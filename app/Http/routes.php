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
<<<<<<< HEAD
=======
*/

/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

just test
*/

Route::group( array('domain' => 'mystack.com', 'prefix' => '/' ), function() { mystack(); });
Route::group( array('domain' => 'www.mystack.com', 'prefix' => '/' ), function() { mystack(); });

function mystack()
{
    // These Routes are listed in the same chronolical Order as they are called
    Route::get( '',                 array('as' => 'landingpage',   'uses' => 'LandingController@index'));
    Route::get( 'create',                 array('as' => 'landingpage',   'uses' => 'LandingController@create'));
}

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
