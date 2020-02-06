<?php

include ('resource.php');
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

$router->group(['prefix' => API], function() use ($router) {

    # User
    $router->get(GET_ALL_USERS, 'UserController@getAllUsers');
    $router->get(GET_USER, 'UserController@getUser');
    $router->post(CREATE_USER, 'UserController@createUser');
    $router->put(UPDATE_USER, 'UserController@updateUser');
    $router->post(CHANGE_PASSWORD, 'UserController@changePassword');
    $router->delete(DELETE_USER, 'UserController@deleteUser');

    # Account
    $router->get(GET_ALL_ACCOUNTS, 'AccountController@getAllAccount');
    $router->get(GET_ACCOUNT, 'AccountController@getAccount');
    $router->post(CREATE_ACCOUNT, 'AccountController@createAccount');
    $router->put(UPDATE_ACCOUNT, 'AccountController@updateAccount');
    $router->delete(DELETE_ACCOUNT, 'AccountController@deleteAccount');

    # Category
    $router->get(GET_ALL_CATEGORIES, 'CategoryController@listAllCategories');
    $router->get(GET_CATEGORY, 'CategoryController@getCategory');
    $router->post(CREATE_CATEGORY, 'CategoryController@createCategory');
    $router->put(UPDATE_CATEGORY, 'CategoryController@updateCategory');
    $router->delete(DELETE_CATEGORY, 'CategoryController@deleteCategory');

    # Subcategories
    $router->get(GET_ALL_SUBCATEGORIES, 'SubCategoryController@listAllCategories');
    $router->get(GET_SUBCATEGORY, 'SubCategoryController@getSubCategory');
    $router->post(CREATE_SUBCATEGORY, 'SubCategoryController@createSubcategory');
    $router->put(UPDATE_SUBCATEGORY, 'SubCategoryController@updateCategory');
    $router->delete(DELETE_SUBCATEGORY, 'SubCategoryController@deleteSubcategory');
});
