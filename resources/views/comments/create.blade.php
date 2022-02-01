<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--後で調べる-->
        <meta name='csrf-token' content='{{ csrf_token() }}'>
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
        
            <!--意見投稿一覧-->
            <iframe width='1000' height='500' src='/comments' ></iframe>
            
            <!--意見投稿の作成-->
            
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
                <!--入力内容を送信するボタン-->
                <input type='submit' value='投稿' />
            </form>
            
            <!--意見投稿を辞める-->
            <div class='reject'>[<a href='/comments'>辞める</a>]</div>
        @endsection
        
        <!--JavaScriptファイル-->
        <script type='text/javascript' src='{{ asset('js/comment.js') }}'></script>
    </body>
</html>