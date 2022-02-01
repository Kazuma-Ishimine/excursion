<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
                        
                        <!--いいね機能-->
                        @if (!$comment->isLikedBy())
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
                            <img src='https://myportfolioimage.s3.ap-northeast-1.amazonaws.com/no-image.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEPX%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIkYwRAIgfWvQzHp%2FRbr7nC2xaQYy210jeA3kfNO4EOfiIWG68lkCIFdmd8r0%2Bsj%2FCih66wdxapbe4e3dZ9H%2FmFcmfeDekDbyKv8CCC4QABoMNDA2MjI5Mzg3ODE3IgwyQbvtaFv2DEaRFi0q3AKIUXgsamDbB4G7Wd2wDYUKOVzGlw97bFeFHu3bQHW15sYF2Gnwnv84RfafWy4Mesw%2FaRei%2FKVLaUYHuArf3ACE2T2w2qAm8cswnMQ4ODyTjTLhNu1Osz4%2F6QwaC361PEc%2FrE1QubTXKxp9LKBzE2xiQbdQ3K0gCgY0WqIylRxxZLAHYIJjHtfY3CbOsd58tRzQRNhMcUWzcGQmJ9xce7%2FHoTlwjUoAkH6YwT5F9Hqee1rediJwfnbR5jayv9S%2FuvyHVWFYZbBPL%2Bk7PaKe25%2FP1ZZqIq6gWdaa2CNu6wS%2B2Ptwfh2G5Tmef30Y0vLPmicLrXDy4sNqlDgJAMRWJozyaUZx4Yci5LkV%2FXpG%2FPivSiqjiVhx6BemKQYGwCvBIAtT9grkzyOVeoHi5TSrh8afRl6h%2F4CN%2F%2Fn5FV%2B7xSeFB1dBuYAwdxdnAaQedMGHJ4i6s%2Bj6Gh59aHViI3cw%2F57fjwY6tAKGEZQhMvicSwSvPaZvGLlczAx9cwD3KCUWjgluTRbWXnMoZZTTGWD5js4VMVro2x%2FWErbDE%2Fb8M9USmAMcuZUbbszY%2FWIleq5Bh9mhEF%2BFgoCLYtgaLrG0gNQVWMUTd20LUlmtmY82Ao8pN2EzP479Lp3WfjASmpCHCfsu6%2BLbw9x5ldXMDj9nH03CEEuOVOlGHW5l6AwZV5AyOPyWg1SwQ6KpNPNozBrhoDRKeHDPvSuJKE0CuU5laqmpSeM%2B1p6WPhyut8aNWco2BrvIQY9VLaYtyxSyrOO07MHWCZgwXdFh8ZRUSlfMjGqRdYWVyfiEnORK5SdTuWF4mI%2BGbKD0Ah155K0ms9516E%2F3KWEUbfP7JeMssd5b37Xlntbk77bcT5JJFNJVxoRGmqQujHJWFTXA6w%3D%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220131T130351Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAV5FJIRIU5MOTYOPX%2F20220131%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=2ff47137aceec1637a4e7d0a0a40b4a151fbd3e25ad6b13164404777df8bf212' width='100' height='100' />
                        @else
                            <img src='{{ $comment->user->image }}' width='100' height='100' />
                        @endif
                        
                    @endforeach
                </div>
                <infinite-loading @infinite='infiniteHandler'></infinite-loading>
            </template>
        @endsection
        <!--infinite-loadingを使うためのCDN-->
        <script src="https://unpkg.com/vue-infinite-loading@^2/dist/vue-infinite-loading.js"></script>
        <!--無限スクロールのコード-->
        <script type='text/javascript' src='{{ asset('js/infinite.js') }}'></script>
        <!--いいね機能-->
        <script type='text/javascript' src='{{ asset('js/comment.js') }}'></script>
    </body>
</html>