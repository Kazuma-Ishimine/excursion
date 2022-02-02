<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--後で調べる-->
        <meta name='csrf-token' content='{{ csrf_token() }}'>
        <title>企業登録(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
        
            <!--企業詳細の作成-->
            
            <!--入力フォーム-->
            <form action='/companies' method="POST" enctype="multipart/form-data">
                <!--csrfトークンフィールド-->
                @csrf
                
                <!--内容入力-->
                <div class='name'>
                    <h2>企業名</h2>
                    <!--内容入力用テキストエリア-->
                    <input name='company[name]' placeholder='企業名' value='{{ old('company.name') }}' />
                    <!--
                    入力エラー時、Requestクラスで設定された
                    入力エラーメッセージを対象項目の下にそれぞれ表示
                    -->
                    <p class='name-error' style='color:red'>{{ $errors->first('company.name') }}</p>
                </div>
                
                <div class='image'>
                    <h2>画像</h2>
                    <!--内容入力用テキストエリア-->
                    <input type='file' name='image' />
                    <!--
                    入力エラー時、Requestクラスで設定された
                    入力エラーメッセージを対象項目の下にそれぞれ表示
                    -->
                    <p class='name-error' style='color:red'>{{ $errors->first('company.image') }}</p>
                </div>
                <!--入力内容を送信するボタン-->
                <input type='submit' value='投稿' />
            </form>
            
            <!--企業作成を辞める-->
            <div class='reject'>[<a href='/services'>辞める</a>]</div>
        @endsection
        
        
    </body>
</html>