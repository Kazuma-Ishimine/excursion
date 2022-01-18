<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
            <h1>仕事で遊ぶ</h1>
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