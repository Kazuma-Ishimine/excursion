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
                <!--投稿削除-->
                <form action='/comments' id='form_{{ $comment->id }}' method='POST' style='display:inline'>
                    @csrf
                    @method('DELETE')
                    <div class='delete-button'>
                        <button type='button' id='{{ $comment->id }}'>delete</button>
                    </div>
                </form>
            @endforeach
        </div>
        <!--ページネーションのリンク-->
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
        <!--JavaScriptの処理-->
        <script>
            const delete_buttons = document.getElementsByClassName('delete_button');
            Array.prototype.forEach.call(delete_buttons,delete_button=>
                delete_button.addEventListener('click', function(e) {
                    const form_id = 'form_' + e.target.id;
                    var dialog_bool = window.confirm('削除しますか?');
                    if (dialog_bool === true) {
                        document.getElementById(form_id).submit();
                    } else {
                        return false;
                    }
                }));
        </script>
    </body>
</html>