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

use App\Http\Controllers\UserController;

/**
 * @var Dingo\Api\Routing\Router $api
 */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->get('users', 'App\Http\Controllers\UserController@all');
	$api->get('users/{id}', 'App\Http\Controllers\UserController@get');
	$api->put('users/{id}', 'App\Http\Controllers\UserController@update');

	$api->post('users', 'App\Http\Controllers\UserController@create');
});



