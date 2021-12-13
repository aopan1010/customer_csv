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

Route::get('/', 'TopPageController@show');

Auth::routes();

Route::get('/top', 'HomeController@index')->name('top');

Route::get('top/customer', 'customerManagementController@index')->name('customer');

//CSV import処理↓
Route::get('top/import', 'UploadController@index')->name('index_import');
Route::post('top/import/upload', 'UploadController@upload')->name('submit_import'); //登録


//Route::post('top/inport/upload', 'InportController@upload');
