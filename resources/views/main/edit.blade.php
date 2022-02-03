<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{ $service->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
        <link rel='stylesheet' href='{{  asset('css/app.css') }}' />
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            
            <!--一覧画面に戻る-->
            <div class='return-index'>[<a href='/services'>一覧へ戻る</a>]</div>
                
            <!--企業とサービス-->
            <!--企業名-->
            <a href="">{{ $service->company->name }}(企業名)</a>
            <!--企業ロゴ-->
            <img class="company-logo" />(企業ロゴ)
            <!--サービス名-->
            <h1 class="name">
                {{ $service->name }}(サービス名)
            </h1>
            
            <!--サービス詳細-->
            <div class='service-content'>
                <h2>サービス紹介</h2>
                <!--サービス内容-->
                <p class='content'>{{ $service->body }}(サービス内容)</p>
                <!--業界名-->
                <h3>業界</h3>
                <a href='/industries/{{ $service->company->industry->id }}'>{{ $service->company->industry->name }}(業界名)</a>
                <!--料金体系-->
                <p class='charge'>{{ $service->charge }}(料金体系)</p>
            </div>
            
            <!--競合他社-->
            <div class='conflicts'>
                @foreach($service->conflicts as $conflict)
                    <h2>競合他社</h2>
                    <!--競合他社名-->
                    <a href=''>{{ $conflict->name }}(競合他社名)</a>
                    <!--競合他社の企業ロゴ-->
                    <img class='conflicts-logo' src='{{ $conflict->image }}' />
                @endforeach
            </div>
            
            <!--用語-->
            <div class='terms'>
                @foreach($service->terms as $term)
                    <h2>用語解説</h2>
                    <!--用語名-->
                    <a href=''>{{ $term->name }}用語名</a>
                    <!--用語の意味-->
                    <p>{{ $term->mean }}用語の意味</p>
                @endforeach
            </div>
            
            <!--意見投稿一覧の表示-->
            <iframe width='1000' height='500' src='/services/{{ $service->comment->id }}' ></iframe>
            
           <!--編集フォーム-->
            <div class='comments'>
                <form action='/comments' method='POST'>
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
            <div class='reject'>[<a href='/main'>辞める</a>]</div>
            
            <!--JavaScriptの記述-->
            <script>
                function deleteComment(e){
                    'use strict';
                    if (confirm('削除すると復元できません。\n 本当に削除しますか?')) {
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
            
        @endsection
        
    </body>
</html>