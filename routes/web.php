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

Route::group(['middleware' => 'auth'], function(){
    # Services
    // サービス一覧の表示
    Route::get('/services', 'ServiceController@index');
    // サービス詳細、競合他社、用語表示
    Route::get('/services/{service}', 'MainController@show');
    
    # Industries
    // 業界毎の企業一覧の表示
    Route::get('/industries/{industry}', 'IndustryController@index');
    
    # Company
    // 企業詳細作成
    Route::get('/companies/create', 'CompanyController@create');
    
    # Comments
    // サービス毎の意見投稿一覧の表示
    // Route::get('/comments/{service}', 'MainController@index');
    
    // 意見投稿一覧の表示
    Route::get('/comments', 'CommentController@index');
    // 意見投稿作成
    Route::get('/comments/create', 'CommentController@create');
    // 意見投稿保存
    Route::post('/comments', 'CommentController@store');
    // 意見投稿詳細
    Route::get('/comments/{comment}', 'CommentController@show');
    // 意見投稿編集
    Route::get('/comments/{comment}/edit', 'CommentController@edit');
    // 意見投稿編集保存
    Route::put('/comments/{comment}', 'CommentController@update');
    // 意見投稿削除
    Route::delete('/comments/{comment}', 'CommentController@delete');
   
    
    # Likes
    // いいね
    Route::post('/comments/likes', 'CreateController@like');
    
    // プロフィール詳細画面
    Route::get('/user', 'UserController@show');
    // プロフィール編集画面
    Route::get('/user/{user}/edit', 'UserController@edit');
    // プロフィール編集保存
    Route::put('/user/{user}', 'UserController@update');
    
});
    
# Users
// 認証機能に関するルーティング追加
Auth::routes();

// ログインページ
Route::get('/home', 'HomeController@index')->name('home');

# Googleログイン機能
// Google認証ページへユーザーをリダイレクト
Route::get('login/google', 'GoogleLoginController@redirectToGoogle');
// Googleからユーザー情報を取得
Route::get('login/google/callback', 'GoogleLoginController@handleGoogleCallback');





