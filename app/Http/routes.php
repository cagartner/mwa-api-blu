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

$app->get('users', [
    'as' => 'user.get', 'uses' => 'UserController@all'
]);

$app->post('users', [
    'as' => 'user.create', 'uses' => 'UserController@create'
]);