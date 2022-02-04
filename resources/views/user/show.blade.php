<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{ Auth::user()->name }}のアカウント</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
        <link rel='stylesheet' href='/css/user.css'/>
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
        <div class='user-information'>
            <h1 class='title'>ユーザー情報</h1>
                <!--ユーザー名-->
                <h3>ユーザー名</h3>
                <div class='user-name'>{{ Auth::user()->name }}</div>
                <!--メールアドレス-->
                <h3>メールアドレス</h3>
                <div class='user-mail'>{{ Auth::user()->email }}</div>
                <h3>プロフィール画像</h3>
                <!--プロフィール画像-->
                <div class='profile-img'>
                    <!--プロフィール画像の表示-->
                    @if(Auth::user()->image === null)
                        <img src='https://s3-ap-northeast-1.amazonaws.com/myportfolioimage/no-image.png' />
                    @else
                        <img src='{{ Auth::user()->image }}' />
                    @endif
                </div>
                <!--編集画面への遷移-->
                <div class='back'>[<a href='/user/{{ Auth::user()->id }}/edit'>プロフィール編集</a>]</div>
        </div>
        @endsection
    </body>
</html>