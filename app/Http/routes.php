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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {

});

//ADMIN ROUTES GROUP (ADMIN ONLY ACCESS)
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'LoginController@dashboard']);

    //USERS CRUD
    Route::resource('user', 'UserController');
    Route::get('user/{id}/approve', ['as' => 'admin.user.approve', 'uses' => 'UserController@approve']);

    //CATEGORY CRUD
    Route::resource('category', 'CategoryController');

});