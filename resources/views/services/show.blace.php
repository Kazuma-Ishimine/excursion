<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='vieport' content='width=device-width, initial-scale=1'>
        <title>{{ $services->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/app.css'>
    </head>
    <body>
        <!--企業とサービス-->
        <!--企業ロゴ-->
        <img class="company-logo" />
        <!--サービス名-->
        <h1 class="name">
            {{ $service->name }}
        </h1>
        <!--企業名-->
        <a href="">company_name</a>
        
        <!--サービス詳細-->
        <div class='service-content'>
            <h2>サービス紹介</h2>
            <!--サービス内容-->
            <p class='content'>{{ $service->body }}</p>
            <!--業界-->
            <h3>industry</h3>
            <!--料金体系-->
            <p class='charge'>{{ $service->charge }}</p>
        </div>
        
        <!--競合他社-->
        <div class='conflicts'>
            <h2>競合他社</h2>
            <!--競合他社名-->
            <a href=''>競合他社名</a>
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
            <!--投稿内容-->
            <div class='content'>
                <!--投稿本文-->
                <p>投稿文</p>
                <!--いいね-->
                <div class='good'>いいね:</div>
            </div>
            <!--投稿作成-->
            
        </div>
    </body>
</html>