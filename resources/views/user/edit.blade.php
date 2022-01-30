<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ Auth::user()->name }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューから継承するヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
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
                    <input type='text' name='post[name]' value='{{ Auth::user()->name }}' />
                </div>
                <!--メールアドレス-->
                <div class='user-mail'>
                    <h3>メールアドレス</h3>
                    <input type='email' name='post[email]' value='{{ Auth::user()->email }}' />
                </div>
                <!--プロフィール画像-->
                <div class='profile-img'>
                    <h3>プロフィール画像</h3>
                    <!--プロフィール画像の編集-->
                    <input type='file' name='image' /></br>
                    <!--プロフィール画像の表示-->
                    @if(Auth::user()->image === null)
                        <img src='https://myportfolioimage.s3.ap-northeast-1.amazonaws.com/no-image.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEND%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIkcwRQIhALzhe3myR81rTCX0VVbLWoQIPSniTsx05m6S8uFTtAMEAiAxslj42o86WtkKCMQhBMwEPJrZit%2FEP%2BMc7VLdXe6JkSqIAwj5%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAAaDDQwNjIyOTM4NzgxNyIM9kYnmkPGzYGhXUEfKtwCWKejdkrUYTpPOb6fPuYwkf046HwIW6%2BYe56Uo7L3%2BfpsiA0MrPDpyhqTqZ7LAjm4BcpRFi%2Bsl78WBIawR8ep0xmpKQtC9wU6blb%2BbVqoZA8N4OdPF8RLfV6pcS2q23CCRBw0x6BtWeD9o18LS2Y2ALfOxaKXQk1Kb9yxELBclst29UoNryX%2FwjHHJvDn6CD9Ofd47OU15s4s6dr6I3NeGunITVFFVJ0Q0lFsRSXWdsbZYbHdgL6ExAcC1DPdWjF9OMy7WI0pQAc3kZWtdDUrKd8aDrPYCntpRDqQfqvBajLCT2%2Bpt%2B3IX23Qyt8pRrNom5%2FnwbF5ZiiAyA4s7vsHp%2F7Zqs7B2ywEgs8M9pZTFGyo%2FrVmnpIzUPfjg9JPooQy7idm95R9Y3PiCmiAGv%2BQJLNYWY0FMLVy%2FeJWe9aYdgCk3kPPiaVzBUOBX0BcW8UAVGSynu9vRK6Lo4GAMJyr148GOrMCp2ldE4xbqfZ%2FIOwMGEckKhUu%2BUhXf6CYgxT43Fe2n1n2lefhWsnCu0U%2FSWSUYtBYNrOofoNX0D4m2avzcg4yDcMu%2B5XzYwqB9SscXAsKoJD1DRADgRQIru4FkcxJvDIJFuR2bl6hIwbOKRUWbKMusHQviiOeagavurrFFpmMEOOeYO3OzVDzOjJPpCq4Yylk1%2B2NWASHZbJOJ%2BWwiA5cyPr5WQGY2j23r6chkRI9PC9b3QvI2jYE%2FACwEEOktACJxr468xaNtJMUEPvzrMqetU9YJX3G3Ag1BKbR9%2Faf9gDynwOBG8bJHc9fGBIsWAtaHVrjeLLC0rjBku9LRQe%2BXiMwDZe0khdcRgI9QAZtWI7WNgxL2VI2rqXOFODb%2FdLQvJoaMGBnvQjn55OtzIn8CWtRzg%3D%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220130T013458Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAV5FJIRIUYAXB6SOL%2F20220130%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=bb757b0ff898ee1ffee1e48dd2d054f66761b744483c510db67a02e57acb7899' width='100' height='100' />
                    @else
                        <img src='{{ Auth::user()->image }}' width='100' height='100' />
                    @endif
                </div>
                </br>
                <!--ユーザー情報の保存-->
                <input type='submit' value='保存' />
                <!--ユーザー詳細画面に戻る-->
                <div class='back'>[<a href='/user'>back</a>]</div>
            </form>
        @endsection
    </body>
</html>