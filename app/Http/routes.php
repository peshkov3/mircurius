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
Route::get('/',  ['as' => 'home', 'uses' => 'HomeController@getIndex']);
Route::get('about',  ['as' => 'home.about', 'uses' => 'HomeController@getAbout']);
Route::get('contact',  ['as' => 'home.contact', 'uses' => 'HomeController@getContact']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controller('category', 'CategoryController', [
    'getList' => 'category.list',
]);


Route::get('category/search',  ['as' => 'category.search', 'uses' => 'CategoryController@getSearch']);
Route::get('category/{id}',  ['as' => 'category.view', 'uses' => 'CategoryController@getProduct']);

Route::get('product-by-category-id/{category_id}',  ['as' => 'product.category_id', 'uses' => 'ProductController@getProductByCategoryId']);
Route::get('product/{id}',  ['as' => 'product.view', 'uses' => 'ProductController@getProduct']);

Route::get('manager',  ['as' => 'manager.view', 'uses' => 'ManagerController@getIndex']);


// Доступ авторизованным пользователям
Route::group(['middleware' => 'auth'], function() {

    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@getIndex']);

    Route::get('user/profile', ['as' => 'user.profile', 'uses' => 'UserController@getProfile']);
    Route::post('user', ['as' => 'user.save', 'uses' => 'UserController@postUser']);

    Route::get('user/update', ['as' => 'user.form', 'uses' => 'UserController@getUpdate']);
    Route::post('user/update', ['as' => 'user.update', 'uses' => 'UserController@postUpdate']);

    Route::get('user/change-password', ['as' => 'user.password', 'uses' => 'UserController@getChangePassword']);
    Route::post('user/change-password', ['as' => 'user.password-reset', 'uses' => 'UserController@postChangePassword']);


    Route::get('user/history', ['as' => 'user.history', 'uses' => 'UserController@getHistory']);


    Route::get('order',  ['as' => 'order.index', 'uses' => 'OrderController@getOrder']);

});