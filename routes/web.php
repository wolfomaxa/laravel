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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', ['as' => 'news', 'uses' => 'NewsController@index']);
Route::post('/search', ['as' => 'news.search', 'uses' => 'NewsController@search']);
Route::get('/{alias}', ['as' => 'get-news', 'uses' => 'NewsController@show']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
