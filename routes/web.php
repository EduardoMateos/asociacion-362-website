<?php

use Illuminate\Support\Facades\Route;

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


Route::get('home', 'HomeController@index')->name('home');

Route::get('{slug}', 'PageController@show');
Route::get('campamentos/{slug}', 'CampsController@show');

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
    
    Route::group(['prefix' => 'pages', 'as'=>'pages.'], function () {
        Route::get('', 'Admin\PageController@list')->name('list');
        Route::get('add', 'Admin\PageController@add')->name('add');
        Route::post('post', 'Admin\PageController@store')->name('store');
    });

    Route::group(['prefix' => 'camps', 'as'=>'camps.'], function () {
        Route::get('', 'Admin\CampsController@list')->name('list');
        Route::get('add', 'Admin\CampsController@add')->name('add');
        Route::post('add', 'Admin\CampsController@store')->name('store');
        Route::post('image', 'Admin\CampsController@storeImage')->name('storeImage');
    });

});