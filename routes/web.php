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
    'as' => 'admin.',
    'middleware' => ['auth', 'isAdmin']
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::match(['get', 'post'], '/create', 'IndexController@create')->name('create');
    Route::match(['get', 'post'], '/downloadNewsByCategory', 'IndexController@downloadNewsByCategory')->name('downloadNewsByCategory');
    Route::match(['get', 'post'], 'addImage/{id}', 'IndexController@addImage')->name('addImage');

    Route::group([
        'prefix' => 'news/',
        'as' => 'news.'
    ], function () {
        Route::get('/', 'NewsController@index')->name('index');
        Route::post('/update/{news}', 'NewsController@update')->name('update');
        Route::get('/destroy/{news}', 'NewsController@destroy')->name('destroy');
        Route::get('/edit/{news}', 'NewsController@edit')->name('edit');
        Route::match(['get', 'post'], '/create', 'NewsController@create')->name('create');
    });

    Route::group([
        'prefix' => 'users/',
        'as' => 'users.'
    ], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/setAdmin/{user}', 'UserController@setAdmin')->name('setAdmin');
        Route::get('/unsetAdmin/{user}', 'UserController@unsetAdmin')->name('unsetAdmin');
        Route::get('/delete/{user}', 'UserController@delete')->name('delete');
    });



    Route::resource('categories', 'CategoriesController');

    Route::get('categories/{categories}/destroy', 'CategoriesController@destroy')->name('categories.destroyOne');

    Route::get('/parse', 'NewsParserController@index')->name('parse');
    });
Auth::routes();

Route::match(['get','post'], '/profile', 'ProfileController@update')->name('editProfile')->middleware('auth');

Route::get('login/vk', 'LoginController@loginVK')->name('loginVk');
Route::get('login/vk/response', 'LoginController@responseVK')->name('responseVK');

Route::get('login/GitHub', 'LoginController@loginGitHub')->name('loginGitHub');
Route::get('login/GitHub/response', 'LoginController@responseGitHub')->name('responseGitHub');
