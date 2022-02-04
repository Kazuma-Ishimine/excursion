<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{  asset('css/app.css') }}' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.scroll')
        
        <!--子ビュー固有のパーツ-->
        @section('content')

            <!--意見投稿一覧を表示-->
                <h2>意見投稿</h2>
                <div class='comment'>
                    
                    <div class='profile'>
                        <!--プロフィール画像-->
                        @if($comment->user->image === null)
                            <img src='https://s3-ap-northeast-1.amazonaws.com/myportfolioimage/no-image.png' />
                        @else
                            <img src='{{ $comment->user->image }}' />
                        @endif
                        <!--ユーザー名-->
                        <div class='user-name'>{{ $comment->user->name }}</div>
                    </div>
                    
                    <div class='comment-content'>
                        <!--投稿内容-->
                        <div class='content'>
                            <p class='body'>{{ $comment->body }}(本文)</p>
                            <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                            {{ $comment->service->name }}
                        </div>
                    </div>
                </div>
        @endsection
    </body>
</html>