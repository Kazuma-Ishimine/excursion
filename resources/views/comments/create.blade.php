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
                <textarea name='post[body]' placeholder='意見投稿'></textarea>
            </div>
            <!--いいねの数_仮-->
            <input type='number' name='post[review]' />
            <!--入力内容を送信するボタン-->
            <input type='submit' value='投稿' />
        </form>
    </body>
</html>