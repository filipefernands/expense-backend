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

    # User
    $router->get(resource::GET_ALL_USERS, 'UserController@getAllUsers');
    $router->get(resource::GET_USER, 'UserController@getUser');
    $router->post(resource::CREATE_USER, 'UserController@createUser');
    $router->put(resource::UPDATE_USER, 'UserController@updateUser');
    $router->post(resource::CHANGE_PASSWORD, 'UserController@changePassword');
    $router->delete(resource::DELETE_USER, 'UserController@deleteUser');

    # Account
    $router->get(resource::GET_ALL_ACCOUNTS, 'AccountController@getAllAccount');
    $router->get(resource::GET_ACCOUNT, 'AccountController@getAccount');
    $router->post(resource::CREATE_ACCOUNT, 'AccountController@createAccount');
    $router->put(resource::UPDATE_ACCOUNT, 'AccountController@updateAccount');
    $router->delete(resource::DELETE_ACCOUNT, 'AccountController@deleteAccount');

    # Category
    $router->get(resource::GET_ALL_CATEGORIES, 'CategoryController@listAllCategories');
    $router->get(resource::GET_CATEGORY, 'CategoryController@getCategory');
    $router->post(resource::CREATE_CATEGORY, 'CategoryController@createCategory');
    $router->put(resource::UPDATE_CATEGORY, 'CategoryController@updateCategory');
    $router->delete(resource::DELETE_CATEGORY, 'CategoryController@deleteCategory');

    # Subcategories
    $router->get(resource::GET_ALL_SUBCATEGORIES, 'SubCategoryController@listAllCategories');
    $router->get(resource::GET_SUBCATEGORY, 'SubCategoryController@getSubCategory');
    $router->post(resource::CREATE_SUBCATEGORY, 'SubCategoryController@createSubcategory');
    $router->put(resource::UPDATE_SUBCATEGORY, 'SubCategoryController@updateCategory');
    $router->delete(resource::DELETE_SUBCATEGORY, 'SubCategoryController@deleteSubcategory');
});

