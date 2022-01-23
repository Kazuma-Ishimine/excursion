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
    // サービス詳細の表示
    Route::get('/services/{service}', 'MainController@show');
    
    # Industries
    // 業界毎の企業一覧の表示
    Route::get('/industries/{industry}', 'IndustryController@index');
        
    # Comments
    // 意見投稿一覧の表示
    Route::get('/comments', 'CreateController@index');
    // 意見投稿作成
    Route::get('/comments/create', 'CreateController@create');
    // 意見投稿保存
    Route::post('/comments', 'CreateController@store');
    // 意見投稿編集
    Route::get('/comments/{comment}/edit', 'CommentController@edit');
    // 意見投稿編集保存
    Route::put('/comments', 'CommentController@update');
    // 意見投稿削除
    Route::delete('/comments', 'CommentController@delete');
});

# Comments(無限スクロール)
Route::get('comment', 'CommentController@index');
Route::get('/comment', 'CommentController@fetch');
    
# Users
// 認証機能に関するルーティング追加
Auth::routes();

// ログインページ
Route::get('/home', 'HomeController@index')->name('home');

// プロフィール画面
Route::get('/user', 'UserController@update');

# Googleログイン機能
// Google認証ページへユーザーをリダイレクト
Route::get('login/google', 'GoogleLoginController@redirectToGoogle');
// Googleからユーザー情報を取得
Route::get('login/google/callback', 'GoogleLoginController@handleGoogleCallback');





