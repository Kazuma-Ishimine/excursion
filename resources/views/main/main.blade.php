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
            {{ $service->conflicts }}
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
            
        @endsection
        
    </body>
</html>