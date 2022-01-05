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
# サービス一覧表示
Route::get('/services', 'ServiceController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
