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
Route::get('/authors', ['as' => 'authors.search', 'uses' => 'AuthorsController@getAuthorsHaveNews']);
//Route::get('/city', ['as' => 'city', 'uses' => 'CityController@index']);
//Route::get('/autocomplete', 'CityController@autocomplete');
Route::get('/city',array('as'=>'autocomplete','uses'=>'CityController@index'));
Route::get('/sitemap', 'NewsController@GenerateSitemap');
Route::get('/searchajax',array('as'=>'searchajax','uses'=>'CityController@autoComplete'));
Route::get('/dublearray', ['as' => 'news.dublearray', 'uses' => 'NewsController@doubleArray']);
Route::get('/news-this-week', ['as' => 'news.now_week', 'uses' => 'NewsController@getNewsThisWeek']);
Route::get('/news/{alias}', ['as' => 'get-news', 'uses' => 'NewsController@show']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
