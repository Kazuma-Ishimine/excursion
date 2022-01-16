<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>仕事で遊ぶ</h1>
        <!--入力フォーム-->
        <form action='/comments' method="POST">
            <!--csrfトークンフィールド-->
            @csrf
            <!--内容入力-->
            <div class='body'>
                <h2>意見投稿内容</h2>
                <!--内容入力用テキストエリア-->
                <textarea name='post[body]' placeholder='意見投稿'>{{ old('post.body') }}</textarea>
                <!--
                入力エラー時、CommentRequestクラスで設定された
                入力エラーメッセージを対象項目の下にそれぞれ表示
                -->
                <p class='body-error' style='color:red'>{{ $errors->first('post.body') }}</p>
            </div>
            <!--いいねの数入力-->
            <div class='review'>
                <h2>いいねの数(仮)</h2>
                <!--いいねの数_仮_入力-->
                <input type='number' name='post[review]' value='{{ old('post.review') }}' />
                <!--
                入力エラー時、CommentRequestクラスで設定された
                入力エラーメッセージを対象項目の下にそれぞれ表示
                -->
                <p class='review-error' style='color:red'>{{  $errors->first('post.review') }}</p>
            </div>
            <!--入力内容を送信するボタン-->
            <input type='submit' value='投稿' />
        </form>
        <!--意見投稿の作成を辞める-->
        <div class='reject'>[<a href='/comments'>辞める</a>]</div>
    </body>
</html>