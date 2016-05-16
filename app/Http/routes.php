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

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {

});

Route::get('/', function() {
    return view('welcome');
});

//REDIRECT IF AUTHENTICATED
Route::get('/store', ['middleware' => 'store', function() {

} ]);
//STORE INDEX & EDIT
Route::get('/store/{link}', ['as' => 'store.index', 'uses' => 'StoreController@index']);

Route::get('/settings', ['as' => 'store.settings', 'uses' => 'StoreController@edit']);

Route::post('/store/update', ['as' => 'store.update', 'uses' => 'StoreController@update']);

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