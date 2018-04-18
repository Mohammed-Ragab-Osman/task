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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/add-post','PostesController@addpost');
    Route::post('/store-post/','PostesController@storepost');
    Route::get('/all-post', 'PostesController@allpost');
    Route::get('/delete-post/{id}', 'PostesController@deletepost');
    Route::get('/edite-post/{id}', 'PostesController@editpost');
    Route::post('/update-post/{id}', 'PostesController@updatepost');

});