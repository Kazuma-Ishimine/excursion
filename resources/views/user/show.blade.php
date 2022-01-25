<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{ Auth::user()->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
        <h1 class='titile'>ユーザー情報</h1>
            <!--ユーザー名-->
            <h3>ユーザー名</h3>
            <div class='user-name'>{{ Auth::user()->name }}</div>
            <!--メールアドレス-->
            <h3>メールアドレス</h3>
            <div class='user-mail'>{{ Auth::user()->email }}</div>
            <!--プロフィール画像-->
            <div class='profile-img'>
                <h3>プロフィール画像</h3>
                <!--プロフィール画像の表示-->
                @if(Auth::user()->image === null)
                    <img src='s3/no-image.png' width='100' height='100' />
                @else
                    <img src='{{ Auth::user()->image }}' width='100' height='100' />
                @endif
            </div>
            <!--編集画面への遷移-->
             <div class='back'>[<a href='/user/{{ Auth::user()->id }}/edit'>プロフィール編集</a>]</div>
            <!--サービス詳細画面への遷移 -->
        @endsection
    </body>
</html>