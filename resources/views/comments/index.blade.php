<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--意見投稿一覧を表示-->
            <div class='contens'>
                <!--取得した意見投稿を表示-->
                <div v-for='comment in comments' :key='comments.id'>
                    @{{ comments.comment }}
                </div>
                <!--無限スクロール実装-->
                <infinite-loading @infinite='fetchTweets'></infinite-loading>
            </div>
        @endsection
    </body>
</html>