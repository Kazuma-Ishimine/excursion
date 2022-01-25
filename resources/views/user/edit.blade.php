<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ Auth::user()->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <h1 class='title'>プロフィール編集</h1>
            <!--編集フォーム-->
            <form action='/user' method='POST'>
                <!--csrfトークンフィールド-->
                @csrf
                <!--PUTリクエスト-->
                @method('PUT')
                <!--ユーザー名-->
                <div class='user-name'>
                    <h3>ユーザー名</h3>
                    <input type='text' name='post[name]' value='{{ Auth::user()->name }}' />
                </div>
                <!--メールアドレス-->
                <div class='user-mail'>
                    <h3>メールアドレス</h3>
                    <input type='email' name='post[email]' value='{{ Auth::user()->email }}' />
                </div>
                <!--プロフィール画像-->
                <div class='profile-img'>
                    <h3>プロフィール画像</h3>
                    <!--プロフィール画像の編集-->
                    <input type='file' name='post[image]' />
                    <!--プロフィール画像の表示-->
                    @if(Auth::user()->image === null)
                        <img src='/myportfolioimage/no-image.png' width='100' height='100' />
                    @else
                        <img src='{{ Auth::user()->image }}' width='100' height='100' />
                    @endif
                </div>
                </br>
                <!--ユーザー情報の保存-->
                <input type='submit' value='保存' />
                <!--ユーザー詳細画面に戻る-->
                <div class='back'>[<a href='/user'>back</a>]</div>
            </form>
        @endsection
    </body>
</html>