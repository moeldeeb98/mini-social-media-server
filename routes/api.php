<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * endpoints to get access from the front end application
 * with its authentication
 */
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth:api');

Route::get('/posts', 'PostsController@index')->middleware('auth:api');
Route::get('/timeline', 'UserController@timeline')->middleware('auth:api');
Route::post('/posts', 'PostsController@store')->middleware('auth:api');
Route::delete('/posts/{post}', 'PostsController@destroy')->middleware('auth:api');
