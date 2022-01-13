<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>仕事で遊ぶ</h1>
        <!--意見投稿一覧を表示-->
        <div class='comments'>
            @foreach($comments as $comment)
                <div class='comment'>
                    <p class='body'>{{ $comment->body }}</p>
                    <p class='update-day'>{{ $comment->updated_at }}</p>
                    <h3 class='review'>{{ $comment->review }}</h3>
                </div>
            @endforeach
        </div>
        <!--ページネーションのリンク-->
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
    </body>
</html>