<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿編集(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>仕事で遊ぶ</h1>
        
        <!--編集フォーム-->
        <div class='comments'>
            <form action='/comments' method='POST'>
                @csrf
                @method('PUT')
                <!--意見内容編集-->
                <div class='comment-body'>
                    <h2>意見欄</h2>
                    <!--意見内容入力-->
                    <input type='text' name='post[body]' value='{{ $comment->body }}' />
                    <!--入力エラー時、入力エラーメッセージを対象項目の下に表示-->
                    <p class='body-error' style='color:red'>{{ $errors->first('post.body') }}</p>
                </div>
                <!--いいねの数編集_仮-->
                <div class='comment-review'>
                    <!--いいねの数入力-->
                    <input type='number' name='post[review]' value='{{ $comment->review }}' />
                    <!--入力エラー時、入力エラーメッセージを対象項目の下に表示-->
                    <p class='review-error' style='color:red'>{{ $errors->first('post.review') }}</p>
                </div>
                <!--編集内容を保存-->
                <input type='submit' value='編集' />
            </form>
        </div>
        
        <!--削除領域-->
        <form action='/comments' id='form_delete' method='POST'>
            <!--csrf-->
            {{ csrf_field() }}
            <!--deleteリクエスト-->
            {{ method_field('delete') }}
            <!--削除ボタン-->
            <input type='submit' style='display:none' />
            <p class='delete-button'>[<span onclick='return deleteComment(this);'>投稿削除</span>]</p>
        </form>
        
        <!--意見投稿の編集を辞める-->
        <div class='reject'>[<a href='/comments'>辞める</a>]</div>
        
        <!--JavaScriptの記述-->
        <script>
            function deleteComment(e){
                'use strict';
                if (confirm('削除すると復元できません。\n 本当に削除しますか?')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
        
    </body>
</html>