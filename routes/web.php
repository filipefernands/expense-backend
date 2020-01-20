<?php

require_once ('resource.php');
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
    return $router->app->version();
});

$router->group(['prefix' => resource::BASE], function() use ($router) {

    $router->get(resource::GET_ALL_USERS, 'UserController@getAllUsers');
    $router->get(resource::GET_USER, 'UserController@getUser');
    $router->post(resource::CREATE_USER, 'UserController@createUser');
    $router->put(resource::UPDATE_USER, 'UserController@updateUser');
    $router->post(resource::CHANGE_PASSWORD, 'UserController@changePassword');
    $router->delete(resource::DELETE_USER, 'UserController@deleteUser');

});

