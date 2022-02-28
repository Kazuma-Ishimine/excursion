<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧と編集</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        
            <!--意見投稿一覧-->
            <iframe width='1000' height='500' src='/comments' ></iframe>
            
            <!--編集フォーム-->
            <div class='comments'>
                <form action='/comments/{{ $comment->id }}' method='POST'>
                    @csrf
                    @method('PUT')
                    <!--意見内容編集-->
                    <div class='comment-body'>
                        <h2>意見欄</h2>
                        <!--意見内容入力-->
                        <input type='text' name='comment[body]' value='{{ $comment->body }}' />
                        <!--入力エラー時、入力エラーメッセージを対象項目の下に表示-->
                        <p class='body-error' style='color:red'>{{ $errors->first('comment.body') }}</p>
                    </div>
                    <!--編集内容を保存-->
                    <input type='submit' value='編集' />
                </form>
            </div>
            
            <!--削除領域-->
            <form action='/comments/{{ $comment->id }}' id='form_delete' method='POST'>
                <!--csrf-->
                {{ csrf_field() }}
                <!--deleteリクエスト-->
                {{ method_field('delete') }}
                <!--削除ボタン-->
                <input type='submit' id='delete-button' onclick='event.preventDefault()' value='投稿削除' />
            </form>
            
            <!--意見投稿の編集と削除を辞める-->
            <div class='reject'>[<a href='/comments/create'>辞める</a>]</div>
            
        @endsection
        
        <!--JavaScriptの記述-->
        <script type='text/javascript' src='{{ asset('js/comment.js') }}'></script> 
        
    </body>
</html>