<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>仕事で遊ぶ</h1>
        <!--作成画面への遷移-->
        <div class='comment-create'>[<a href='/comments/create'>作成</a>]</div>
        <!--意見投稿一覧を表示-->
        <div class='comments'>
            @foreach($comments as $comment)
                <div class='comment'>
                    <p class='body'>{{ $comment->body }}(本文)</p>
                    <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                    <h3 class='review'>{{ $comment->review }}(いいねの数)</h3>
                </div>
                <!--編集画面への遷移-->
                <div class='comment-edit'>[<a href='/comments/{{ $comment->id }}/edit'>編集</a>]</div>
            @endforeach
        </div>
        <!--ページネーションのリンク-->
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
    </body>
</html>