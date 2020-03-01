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

Route::group(['as' => 'images.'], function () {
    Route::get('images/view/{image}', 'ImageController@uploadComplete')->name('upload_complete');
    Route::get('images/index', 'ImageController@index')->name('index');
    Route::get('emoticons', 'ImageController@upload')->name('upload');
    Route::post('emoticons', 'ImageController@emoticons')->name('post');
    Route::post('emoticon_report_abuse/{shortcut}', 'ImageController@reportAbuse')->name('report_abuse');
});

// API

Route::apiResource('emoticons', 'EmoticonsController');

Route::post('autocomplete', 'API\EmoticonsController@autocomplete')->name('autocomplete');
