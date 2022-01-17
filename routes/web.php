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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', 'TopPageController@show');

Auth::routes();

Route::get('/top', 'HomeController@index')->name('top');

Route::get('top/customer', 'customerManagementController@index')->name('customer'); // 顧客表示
Route::post('top/customer/check', 'CustomerManagementController@check')->name('check'); //チェックボックス・備考メモ保存


//CSV import処理↓
Route::get('top/import', 'UploadController@index')->name('index_import');
Route::post('import/upload', 'UploadController@upload')->name('submit_import'); //登録

Route::get('top/totalling', 'TotalingController@index')->name('index_totaling');//集計ページ表示
