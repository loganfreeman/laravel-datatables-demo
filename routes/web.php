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

Route::get('datatables', 'DatatablesController@getIndex');

Route::get('datatables/data', 'DatatablesController@anyData')->name('datatables.data');

Route::get('ip', 'GeoIpController@getIndex')->name('geoip');
