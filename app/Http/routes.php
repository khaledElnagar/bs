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

//============================Admin Custom Routes =================================//
Route::get('/admin/category/update', 'admin\CategoryController@updateFromSqlSrv');
Route::post('/admin/book/update', 'admin\BookController@updateFromSqlSrv');
Route::get('/admin/book/updateAmazon/{isbn}', 'admin\BookController@updateFromAmazon');

//============================ Authentication =================================//
Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('/admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login', 'AdminAuth\AuthController@login');
Route::get('/admin/logout', 'AdminAuth\AuthController@logout');
//==================================Admin Resource======================================//
Route::resource('/admin/slide', 'admin\SlideController');
Route::resource('/admin/category', 'admin\CategoryController');
Route::resource('/admin/contact', 'admin\ContactController');
Route::resource('/admin/book', 'admin\BookController');
Route::resource('/admin/order', 'admin\OrderController');
Route::resource('/admin/wish', 'admin\WishController');
Route::resource('/admin/user', 'admin\UserController');
Route::resource('/admin/university', 'admin\UniversityController');
Route::resource('/admin/message', 'admin\MessageController');
Route::resource('/admin/new', 'admin\NewController');
Route::resource('/admin/page', 'admin\PageController');
Route::resource('/admin', 'admin\AdminController');

//============================== Custom Routes===========================================//
Route::delete('/wish/clear','WishController@clearList');
Route::post('/wish/order','WishController@convertToOrder');
Route::get('/wish/updateAll/','WishController@updateAll');

//================================User Resources==========================================//
Route::resource('/book', 'BookController');
Route::resource('/category', 'CategoryController');
Route::get('/checkout','CartController@checkout');
Route::post('/checkout','CartController@completeCheckout');
Route::resource('/cart', 'CartController');
Route::resource('/wish', 'WishController');
//================================account======================================================//
Route::get('/account','AccountController@showDashboard');
Route::get('/account/dashboard','AccountController@showDashboard');
Route::get('/account/information','AccountController@showInformation');
Route::get('/account/wishlist','AccountController@showWishList');
Route::put('/account/{id}','AccountController@update');
//===============================Homecontroller============================================//
Route::get('/contactus','HomeController@contactUs');
Route::post('/contactus','HomeController@storeMessage');
Route::get('/aboutus','HomeController@aboutUs');
Route::get('/privacy','HomeController@privacy');
Route::get('/terms','HomeController@terms');
Route::get('/getState/{id}','HomeController@getState');
Route::post('/search','HomeController@search');
Route::get('/autocomplete/{token}','HomeController@autocomplete');
Route::get('/', 'HomeController@index');
