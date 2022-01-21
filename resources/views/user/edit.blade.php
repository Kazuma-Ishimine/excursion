<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ Auth::user->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--編集フォーム-->
            <form action='/users', method='POST'>
                <!--csrfトークンフィールド-->
                @csrf
                <!--ユーザー名-->
                <div class='user-name'>{{ Auth::user->name }}</div>
                <!--メールアドレス-->
                <div class='user-mail'>{{ Auth::user->mail }}</div>
                <!--プロフィール画像-->
                <div class='profile-img'>
                    <!--プロフィール画像の編集-->
                    <input type='file' name='post[image]' />
                    <!--プロフィール画像の表示-->
                    @if($user->image === null)
                        <img src='/storage/no-image.png' />
                    @else
                        <img src='{{ $user->image }}' width='100' height='100' />
                    @endif
                </div>
            </form>
        @endsection
    </body>
</html>