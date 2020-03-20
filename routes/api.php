<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//allow only index and show
//Route::resource('books', 'BookController', ['only' => ['index', 'show']]);

//show others except create and edit
//Route::resource('books', 'BookController',['except' => ['create', 'edit']]);

Route::resource('users', 'UserController', ['only' => ['index', 'show', 'store']]);

Route::post('search', 'UserController@searchBooks');

Route::get('books', 'UserController@getBooks');

Route::post('login', 'Auth\LoginController@login');

// Route::group(['middleware' => 'auth:api'], function(){
// 	Route::resource('book', 'BookController', ['only' => ['store']]);
// });

/* 
this was commented out as the controller __construct manages the route middleware
	Route::resource('book', 'BookController', ['only' => ['index', 'show', 'store']])->middleware('auth:api');

*/

Route::resource('book', 'BookController', ['only' => ['index', 'show', 'store']]);

//Route::post('book', 'BookController@store')->middleware('auth:api');
//Route::post('search', 'BookController@search');