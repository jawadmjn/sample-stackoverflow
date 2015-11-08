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

/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

*/


/*
Godaddy routes because group is not working on godaddy webhosting
*/

Route::get('/',                 'LandingController@index');
Route::get('createview',        'LandingController@createview');
Route::post('createquestion',   'LandingController@createquestion');
Route::any('showquestion',      'LandingController@showquestion');
Route::post('createanswer',     'LandingController@createanswer');
Route::get('tags',              'LandingController@tags');
Route::get('tag/{tag}',         'LandingController@tagsearch');



/*
Can be use for local virtual domain.

Route::group( array('domain' => 'mystack.com', 'prefix' => '/' ), function() { mystack(); });
Route::group( array('domain' => 'www.mystack.com', 'prefix' => '/' ), function() { mystack(); });

function mystack()
{
    Route::get('',                  array('as' => 'landingpage',   'uses' => 'LandingController@index'));
    Route::get('createview',        array('as' => 'createview',   'uses' => 'LandingController@createview'));
    Route::post('createquestion',   array('as' => 'createquestion',   'uses' => 'LandingController@createquestion'));
    Route::any('showquestion',      array('as' => 'showquestion',   'uses' => 'LandingController@showquestion'));
    Route::post('createanswer',     array('as' => 'createanswer',   'uses' => 'LandingController@createanswer'));
    Route::get('tags',              array('as' => 'tags',   'uses' => 'LandingController@tags'));
    Route::get('tag/{tag}',         array('as' => 'tagsearch',   'uses' => 'LandingController@tagsearch'));
}

*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
