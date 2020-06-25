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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::group(['prefix' => 'pages', 'as'=>'pages.'], function () {
        Route::get('', 'Admin\PageController@list')->name('list');
        Route::get('add', 'Admin\PageController@add')->name('add');
        Route::post('post', 'Admin\PageController@store')->name('store');
    });
});