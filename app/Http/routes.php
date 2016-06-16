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
Route::auth();

Route::group(['middleware' => 'web'], function () {

});

Route::get('/', ['as' => 'index', 'uses' => 'MarketController@index']);

//REDIRECT IF AUTHENTICATED
Route::get('/store', ['middleware' => 'store', function() {

} ]);

//STORE INDEX & SETTINGS

Route::get('/settings', ['as' => 'store.settings', 'uses' => 'StoreController@edit']);

Route::group(['prefix' => 'store', 'as' => 'store.'], function () {

    Route::get('/{link}', ['as' => 'index', 'uses' => 'StoreController@index']);

    Route::post('/update', ['as' => 'update', 'uses' => 'StoreController@update']);
});

Route::group(['prefix' => 'store/{link}/products', 'as' => 'product.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);

    Route::get('/new', ['as' => 'create', 'uses' => 'ProductController@create']);

    Route::post('/store', ['as' => 'store', 'uses' => 'ProductController@store']);
});

Route::post('/imageupload', ['as' => 'imageUpload', 'uses' => 'ProductController@imageAJAXUpload']);

//ADMIN ROUTES GROUP (ADMIN ONLY ACCESS)
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    //ADMIN DASHBOARD
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'LoginController@dashboard']);

    //USERS CRUD
    Route::resource('user', 'UserController');
    Route::get('user/{id}/approve', ['as' => 'admin.user.approve', 'uses' => 'UserController@approve']);

    //CATEGORY CRUD
    Route::resource('category', 'CategoryController');

    //FLOOR CRUD
    Route::resource('floor', 'FloorController');

});

Route::get('/mongo', 'StoreController@monTest');