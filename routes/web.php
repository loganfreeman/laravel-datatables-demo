<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'DatatablesController@users')->name('datatables.users');

Route::get('datatables', 'DatatablesController@getIndex');

Route::get('datatables/data', 'DatatablesController@anyData')->name('datatables.data');

Route::get('ip', 'GeoIpController@getIndex')->name('geoip');

Route::get('any/{id}', ['as' => 'any.token', 'uses' => 'GeoIpController@getHash'] );


Route::get('markdown',
  ['as' => 'markdown', 'uses' => 'MarkdownController@create']);
Route::post('markdown',
  ['as' => 'markdown.show', 'uses' => 'MarkdownController@show']);


Route::post('download/pdf',
  ['as' => 'markdown.download', 'uses' => 'MarkdownController@download']);
