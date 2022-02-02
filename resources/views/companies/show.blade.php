<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>企業詳細(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--企業詳細-->
                
                <h2>企業名</h2>
                <div class='name'>{{ $company->name }}</div>
                <h2>企業ロゴ</h2>
                <img src='{{ $company->image }}' width=100 height=100 />
            
            <!--企業作成を辞める-->
            <div class='reject'>[<a href=''>辞める</a>]</div>
        @endsection
    </body>
</html>