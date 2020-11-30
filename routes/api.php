<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json(['data' => 'Auth and Order Api']);
});

$router->post('login', [
    'as' => 'users.login', 'uses' => 'AuthController@login', 'middleware' => 'throttle:5'
]);

$router->post('register', [
    'as' => 'users.register', 'uses' => 'AuthController@register'
]);


$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    $router->post('order', [
        'as' => 'users.order', 'uses' => 'OrderController@store'
    ]);

});

