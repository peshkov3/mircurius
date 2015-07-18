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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controller('category', 'CategoryController', [
    'getList' => 'category.list',
]);

Route::controller('home', 'CategoryController', [
    'getIndex' => 'home' ,
    'getGallery' => 'gallery' ,
    'getAboutUs' => 'about' ,
    'getContactUs' => 'contact',
    'postContactUs' => 'post.contact'
]);

Route::get('product-by-category-id/{category_id}',  ['as' => 'product.category_id', 'uses' => 'ProductController@getProductByCategoryId']);
Route::get('product/{id}',  ['as' => 'product.view', 'uses' => 'ProductController@getProduct']);
