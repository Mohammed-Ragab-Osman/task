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

Route::group(['namespace'=>'Api'],function(){
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });


    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/all-posts','PostesController@all_posts');
        Route::post('/add-posts','PostesController@add_posts');
        Route::post('/delete-posts','PostesController@deletepost');
        Route::post('/update-posts','PostesController@updatepost');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });

    Route::post('login','UsersController@login');
});