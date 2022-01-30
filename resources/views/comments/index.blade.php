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
            <!--投稿件数を表示-->
            <h2>投稿件数</h2>
            <div class='comment-number'>全{{ $comments->count() }}件</div>
            <!--意見投稿一覧を表示-->
            <template>
                <h2>意見投稿</h2>
                <div class='comments'>
                    @foreach ($comments as $comment)
                        <!--投稿内容-->
                        <div class='comment'>
                            <p class='body'>{{ $comment->body }}(本文)</p>
                            <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                        </div>
                        <!--ユーザー名-->
                        <div class='user-name'>{{ $comment->user->name }}</div>
                    @endforeach
                </div>
                <infinite-loading @infinite='infiniteHandler'></infinite-loading>
            </template>
        @endsection
        <!--infinite-loadingを使うためのCDN-->
        <script src="https://unpkg.com/vue-infinite-loading@^2/dist/vue-infinite-loading.js"></script>
        <!--無限スクロールのコード-->
        <script type='text/javascript' src='{{ asset('js/infinite.js') }}'></script>
    </body>
</html>