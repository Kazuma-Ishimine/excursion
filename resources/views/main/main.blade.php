<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{ $service->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel='stylesheet' href='{{ asset('css/main.css') }}' />
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
                
            <!--企業とサービス-->
            <div class='service'>
                <!--企業について-->
                <div class='company'>
                    <!--企業名-->
                    <h2 class='company-name'>
                        <a href="">{{ $service->company->name }}(企業名)</a>
                    </h2>
                    <!--企業ロゴ-->
                    <img class="company-logo" src='{{ $service->company->image }}' />(企業ロゴ)
                </div>
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
            </div>
            
            <!--競合他社-->
            <div class='conflict-content'>
                <h2>競合他社</h2>
                <div class='conflicts'>
                    @foreach($service->conflicts as $conflict)
                        <div class='conflict'>
                            <!--競合他社名-->
                            <div class='conflict-name'>{{ $conflict->name }}(競合他社名)</div>
                            <!--競合他社の企業ロゴ-->
                            <img class='conflicts-logo' src='{{ $conflict->image }}' />
                        </div>
                    @endforeach
                </div>
            </div>
            <!--用語-->
            <div class='term-content'>
                <h2>用語解説</h2>
                <div class='terms'>
                    @foreach($service->terms as $term)
                        <div class='term'>
                            <!--用語名-->
                            <a href=''>{{ $term->name }}用語名</a>
                            <!--用語の意味-->
                            <p>{{ $term->mean }}用語の意味</p>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!--サービス毎の意見投稿欄へ-->
            <div class='comment-index'>[<a href=''>意見投稿欄へ</a>]</div>
            
        @endsection
        
    </body>
</html>