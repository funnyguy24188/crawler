<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('fb_api_login', 'FbApiController@fbLogin');
Route::get('fb_callback', 'FbApiController@fbCallbackToken');
Route::get('fb_get_post', 'FbApiController@getPost');
Route::get('privacy', 'FbApiController@showPrivacy');