<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{  asset('css/app.css') }}' />
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.scroll')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            
            <!--投稿件数を表示-->
            <h2>投稿件数</h2>
            <div class='comment-number'>{{ $service->name }}の投稿全{{ $service->comments->count() }}件</div>
            
            <!--意見投稿一覧を表示-->
                <h2>意見投稿</h2>
                <div class='comments'>
                    @foreach ($service->comments as $comment)
                    
                        <!--投稿内容-->
                        <div class='comment'>
                            <p class='body'>{{ $comment->body }}(本文)</p>
                            <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                        </div>
                        
                        <!--いいね機能-->
                        @if (!$comment->isLikedBy(Auth::user()))
                            <!--いいねを取り消す-->
                            <span class='likes'>
                                <i class='fas fa-music like-toggle' data-comment-id='{{ $comment->id }}'></i>
                                <span class='like-counter'>{{ $comment->likes_count }}</span>
                            </span>
                        @else
                            <!--いいねをつける-->
                            <span class='likes'>
                                <i class='fas fa-music heart like-toggle liked' data-comment-id='{{ $comment->id }}'></i>
                                <span class='like-counter'>{{ $comment->likes_count }}</span>
                            </span>
                        @endif
                        
                        <!--ユーザー名-->
                        <div class='user-name'>{{ $comment->user->name }}</div>
                        
                        <!--プロフィール画像-->
                        @if($comment->user->image === null)
                             <img src='https://s3-ap-northeast-1.amazonaws.com/myportfolioimage/no-image.png' />
                        @else
                            <img src='{{ $comment->user->image }}' />
                        @endif
                        
                    @endforeach
                </div>
        @endsection
        <!--いいね機能-->
        <script type='text/javascript' src='{{ asset('js/like.js') }}'></script>
    </body>
</html>