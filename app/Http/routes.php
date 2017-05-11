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

/** My Route Start */
Route::get( '/', 'TestController@index' );

Route::post( '/', 'TestController@store' );

Route::get( '/edit/{task}', array(
	'as'   => 'edits',
	'uses' => 'TestController@edit'
) );

Route::post( '/update/{task}', array(
	'as'   => 'product-update',
	'uses' => 'TestController@update'
) );

/** My Route End */


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
