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

Route::get('/', 'HomePageController@index')->name('Home');

Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'News.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/{news}', 'NewsController@show')->name('show');
});

Route::group([
    'prefix' => 'categories',
    'namespace' => 'Categories',
    'as' => 'Categories.'
], function () {
    Route::get('/', 'CategoriesController@index')->name('index');
    Route::get('/{categoryTxt}', 'CategoriesController@show')->name('show');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::match(['get', 'post'], '/create', 'IndexController@create')->name('create');
    Route::match(['get', 'post'], '/downloadNewsByCategory', 'IndexController@downloadNewsByCategory')->name('downloadNewsByCategory');
    Route::match(['get', 'post'], 'addImage/{id}', 'IndexController@addImage')->name('addImage');
    Route::get('news/', 'NewsController@index')->name('news.index');

    Route::post('news/update/{news}', 'NewsController@update')->name('news.update');
    Route::get('news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');
    Route::get('news/edit/{news}', 'NewsController@edit')->name('news.edit');
    Route::match(['get', 'post'], 'news/create', 'NewsController@create')->name('news.create');

    Route::resource('categories', 'CategoriesController');

    Route::get('categories/{categories}/destroy', 'CategoriesController@destroy')->name('categories.destroyOne');
});

Auth::routes();

