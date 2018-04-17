<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/book', 'BookController@apiIndex')->name('book.api-index');
Route::get('/book/{book}', 'BookController@apiShow')->name('book.api-show');

Route::get('/category', 'CategoryController@apiIndex')->name('category.api-index');
Route::get('/category/{category}', 'CategoryController@apiShow')->name('category.api-show');

Route::get('/user', 'UserController@apiIndex')->name('user.api-index');
Route::get('/user/{user}', 'UserController@apiShow')->name('user.api-show');