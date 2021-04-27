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

Route::get('documentacion', 'DocsController@show');
Route::get('campamentos', 'CampsController@show');
Route::get('campamentos/{slug}', 'CampsController@showCamp')->name('showCamp');
Route::get('home', 'HomeController@index')->name('home');
Route::get('{slug}', 'PageController@show')->name('showpage');

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {

    Route::group(['prefix' => 'login', 'as'=>'login.'], function () {
        Route::get('/', 'Admin\AuthController@auth')->name('auth');
        Route::post('/', 'Admin\AuthController@authcheck')->name('authcheck');
    });

    Route::group(['middleware' => ['auth']], function () { 
        Route::group(['prefix' => 'home', 'as'=>'home.'], function () {
            Route::get('/', 'Admin\HomeController@show')->name('show');
        });
    
        Route::group(['prefix' => 'pages', 'as'=>'pages.'], function () {
            Route::get('', 'Admin\PageController@list')->name('list');
            Route::get('add', 'Admin\PageController@add')->name('add');
            Route::get('edit/{id}', 'Admin\PageController@edit')->name('edit');
            Route::post('store/{id?}', 'Admin\PageController@store')->name('store');
        });
    
        Route::group(['prefix' => 'blocks', 'as'=>'blocks.'], function () {
            Route::get('', 'Admin\BlocksController@list')->name('list');
            Route::get('add', 'Admin\BlocksController@add')->name('add');
            Route::get('edit/{id}', 'Admin\BlocksController@edit')->name('edit');
            Route::post('store/{id?}', 'Admin\BlocksController@store')->name('store');
            Route::get('destroy/{id}', 'Admin\BlocksController@destroy')->name('destroy');
        });
    
        Route::group(['prefix' => 'camps', 'as'=>'camps.'], function () {
            Route::get('', 'Admin\CampsController@list')->name('list');
            Route::get('add', 'Admin\CampsController@add')->name('add');
            Route::get('destroy/{id}', 'Admin\CampsController@destroy')->name('destroy');
            Route::get('edit/{id}', 'Admin\CampsController@edit')->name('edit');
            Route::post('store/{id?}', 'Admin\CampsController@store')->name('store');
            Route::post('image', 'Admin\CampsController@storeImage')->name('storeImage');
        });
    
        Route::group(['prefix' => 'docs', 'as'=>'docs.'], function () {
            Route::get('', 'Admin\DocsController@list')->name('list');
            Route::get('add', 'Admin\DocsController@add')->name('add');
            Route::post('add', 'Admin\DocsController@store')->name('store');
            Route::get('destroy/{id}', 'Admin\DocsController@destroy')->name('destroy');
        });
    });

    

});