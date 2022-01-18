<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--ユーザー名-->
            <div class='user-name'>{{ Auth::user()->name }}</div>
            
            <!--サービス一覧-->
            <div class="services">
                @foreach ($services as $service)
                    <div class='service'>
                        <!--サービス名-->
                        <h2 class='name'><a href='/services/{{ $service->id }}'>{{ $service->name }}(サービス名)</a></h2>
                        <!--企業名-->
                        <a href=''>{{ $service->company->name }}(企業名)</a></br>
                        <!--企業ロゴ-->
                        <img class='company-logo'/>(企業ロゴ)
                        <!--サービス内容-->
                        <p class='body'>{{ $service->body }}(サービス内容)</p>
                        <!--業界名-->
                        <a href='/industries/{{ $service->company->industry->id }}'>{{ $service->company->industry->name }}(業界名)</a>
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション-->
            <div class='paginate'>
                {{ $services->links() }}
            </div>
        @endsection
        
    </body>
</html>