<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ Auth::user()->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='/css/edituser.css' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <div class='edit-user'>
                <h1 class='title'>プロフィール編集</h1>
                <!--編集フォーム-->
                <form action='/user/{{ Auth::user()->id }}' method='POST' enctype="multipart/form-data">
                    <!--csrfトークンフィールド-->
                    @csrf
                    <!--PUTリクエスト-->
                    @method('PUT')
                    <!--ユーザー名-->
                    <div class='user-name'>
                        <h3>ユーザー名</h3>
                        <input type='text' name='user[name]' value='{{ Auth::user()->name }}' />
                    </div>
                    <!--メールアドレス-->
                    <div class='user-mail'>
                        <h3>メールアドレス</h3>
                        <input type='email' name='user[email]' value='{{ Auth::user()->email }}' />
                    </div>
                    <!--プロフィール画像-->
                    <div class='profile-img'>
                        <h3>プロフィール画像</h3>
                        <!--プロフィール画像の編集-->
                        <label for="select-img" >
                        　<i class="fas fa-folder fa-2x"></i><input type="file" name='image' id="select-img" />
                        </label></br>
                        <!--プロフィール画像の表示-->
                        @if(Auth::user()->image === null)
                            <img src='https://s3-ap-northeast-1.amazonaws.com/myportfolioimage/no-image.png' />
                        @else
                            <img src='{{ Auth::user()->image }}' />
                        @endif
                    </div>
                    </br>
                    <!--ユーザー情報の保存-->
                    <input type='submit' value='保存' />
                    <!--ユーザー詳細画面に戻る-->
                    <div class='back'>[<a href='/user'>プロフィール画面へ</a>]</div>
                </form>
            </div>
        @endsection
    </body>
</html>