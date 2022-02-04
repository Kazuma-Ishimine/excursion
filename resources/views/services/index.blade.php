<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset('css/services.css') }}' />
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            
            <!--サービス一覧-->
            <div class="services">
                @foreach ($services as $service)
                    <div class='service'>
                        <!--企業について-->
                        <div class='company'>
                            <!--企業名-->
                            <h2 class='company-name'><a href=''>{{ $service->company->name }}(企業名)</a></h2>
                            <!--企業ロゴ-->
                            <img class='company-logo' src='{{ $service->company->image }}' />(企業ロゴ)
                        </div>
                        <!--サービス名-->
                        <h2 class='name'><a href='/services/{{ $service->id }}'>{{ $service->name }}(サービス名)</a></h2>
                        <!--サービス内容-->
                        <p class='body'>{{ $service->body }}(サービス内容)</p>
                        <!--業界名-->
                        <a class='industry' href='/industries/{{ $service->company->industry->id }}'>{{ $service->company->industry->name }}(業界名)</a>
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション-->
            <div class='paginate'>
                {{ $services->links() }}
            </div>
            
            <!--意見投稿一覧への遷移-->
            <div class='comment-index'>
                <a href='/comments/create'>[意見投稿一覧へ]</a>
            </div>
            
        @endsection
        
    </body>
</html>