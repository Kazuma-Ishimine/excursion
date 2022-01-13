<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>仕事で遊ぶ</h1>
        <div class="services">
            @foreach ($services as $service)
                <div class='service'>
                    <!--サービス名-->
                    <h2 class='name'>{{ $service->name }}</h2>
                    <!--企業名-->
                    <a href=''>{{ $service->company->name }}</a>
                    <!--企業ロゴ-->
                    <img class='company-logo'/>
                    <!--サービス内容-->
                    <p class='body'>{{ $service->body }}</p>
                    <!--業界名-->
                    <a href='/industries/{{ $service->company->industry->id }}'>{{ $service->company->industry->name }}</a>
                </div>
            @endforeach
        </div>
        <!--ページネーション-->
        <div class='paginate'>
            {{ $services->links() }}
        </div>
    </body>
</html>