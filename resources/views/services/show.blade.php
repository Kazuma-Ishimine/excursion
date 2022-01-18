<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{ $service->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--ユーザー名-->
            <div class='user-name'>{{ Auth::user()->name }}</div>
            
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
                <h2>競合他社</h2>
                <!--競合他社名-->
                <a href=''>(競合他社名)</a>
                <!--競合他社の企業ロゴ-->
                <img class='conflicts-logo'/>
                <!--ページネーション-->
                <div class='paginate-conflicts'>
                    ページリンク
                </div>
            </div>
            
            <!--用語-->
            <div class='terms'>
                <h2>用語解説</h2>
                <!--用語名-->
                <a href=''>用語名</a>
                <!--用語の意味-->
                <p>用語の意味</p>
                <!--ページネーション-->
                <div class='paginate-terms'>
                    ページリンク
                </div>
            </div>
            
            <!--投稿-->
            <div class='posts'>
                <h2>意見投稿</h2>
                <!--投稿内容一覧-->
                <div class='content'>
                    <!--投稿本文-->
                    <p class="body">投稿文</p>
                    <!--リアクション-->
                    <!--いいね-->
                    <div class='good'>いいね:</div>
                    <!--投稿者名-->
                    <div class='user-name'>投稿者名</div>
                    <!--投稿者のプロフィール画像-->
                    <div class='user-image'>プロフィール画像</div>
                </div>
                <!--投稿作成-->
                <form action='/services/{{ $service->id }}' method='POST'>
                    <!--csrfトークンフィールド-->
                    @csrf
                    <!--内容入力-->
                    <div class='create-body'>
                        <!--内容入力用テキストエリア-->
                        <textarea name='post[body]' placeholder='意見投稿'></textarea>
                    </div>
                    <!--入力内容を送信するボタン-->
                    <input type='submit' value='投稿'/>
                </form>
            </div>
        @endsection
        
    </body>
</html>