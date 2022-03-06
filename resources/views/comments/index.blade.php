<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧</title>
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
            <h2>投稿件数は、全 {{ $comments->count() }} 件</h2>

            <!--意見投稿一覧を表示-->
                <h2>意見投稿</h2>
                <div class='comments'>
                    @foreach ($comments as $comment)
                    
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
                                    <p class='body'>{{ $comment->body }}</p>
                                    <p class='update-day'>{{ $comment->updated_at }}</p>
                                    {{ $comment->service->name }}
                                </div>
                                <!--いいね機能-->
                                @if (!$comment->isLikedBy(Auth::user()))
                                    <!--いいねを取り消す-->
                                    <span class='likes'>
                                        <i class='fas fa-grin-hearts fa-lg like-toggle' data-comment-id='{{ $comment->id }}'></i>
                                        <span class='like-counter'>{{ $comment->likes_count }}</span>
                                    </span>
                                @else
                                    <!--いいねをつける-->
                                    <span class='likes'>
                                        <i class='fas fa-grin-hearts fa-lg heart like-toggle liked' data-comment-id='{{ $comment->id }}'></i>
                                        <span class='like-counter'>{{ $comment->likes_count }}</span>
                                    </span>
                                @endif
                                
                                <!--意見投稿の編集画面へ-->
                                <div class='edit'>[<a href='/comments/{{ $comment->id }}/edit' target='_top'>編集</a>]</div>
                                
                                <!--意見投稿削除画面へ-->
                                <div class='delete'>[<a href='/comments/{{ $comment->id }}/edit' target='_top'>削除</a>]</div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
        @endsection
        <!--いいね機能-->
        <script type='text/javascript' src='{{ asset('js/like.js') }}'></script>
    </body>
</html>