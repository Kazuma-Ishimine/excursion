<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サービス</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <div class="companies">
                @foreach ($companies as $company)
                    <div class='company-content'>
                        <!--企業名-->
                        <a href=''>{{ $company->name }}</a>
                        <!--企業ロゴ-->
                        <img class='company-logo'/>
                        <!--業界名-->
                        <a href=''>{{ $company->industry->name }}</a>
                    </div>
                @endforeach
            </div>
            <!--サービス詳細画面へ遷移-->
            <div class='fotter'>
                <a href='/services'>[戻る]</a>
            </div>
            <!--ページネーション-->
            <div class='paginate'>
                {{ $companies->links() }}
            </div>
        @endsection
    </body>
</html>