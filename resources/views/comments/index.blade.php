<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{  asset('css/app.css') }}' />
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.scroll')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--投稿件数を表示-->
            <h2>投稿件数</h2>
            <div class='comment-number'>全{{ $comments->count() }}件</div>
            <!--意見投稿一覧を表示-->
                <h2>意見投稿</h2>
                <div class='comments'>
                    @foreach ($comments as $comment)
                    
                        <!--投稿内容-->
                        <div class='comment'>
                            <p class='body'>{{ $comment->body }}(本文)</p>
                            <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                        </div>
                        
                        <!--いいね機能-->
                        @if (!$comment->isLikedBy(Auth::user()))
                            <!--いいねを取り消す-->
                            <span class='likes'>
                                <i class='fas fa-music like-toggle' data-comment-id='{{ $comment->id }}'></i>
                                <span class='like-counter'>{{ $comment->likes_count }}</span>
                            </span>
                        @else
                            <!--いいねをつける-->
                            <span class='likes'>
                                <i class='fas fa-music heart like-toggle liked' data-comment-id='{{ $comment->id }}'></i>
                                <span class='like-counter'>{{ $comment->likes_count }}</span>
                            </span>
                        @endif
                        
                        <!--ユーザー名-->
                        <div class='user-name'>{{ $comment->user->name }}</div>
                        
                        <!--プロフィール画像-->
                        @if($comment->user->image === null)
                            <img src='https://myportfolioimage.s3.ap-northeast-1.amazonaws.com/no-image.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEB0aDmFwLW5vcnRoZWFzdC0xIkYwRAIgQUu4zCuvo8uudfH%2BUWDSUUps2JoPA2YQWrcIbMJ3%2F8cCIDAzaCTgCdIE41bPD6nSEdofFHgKSApOT6miKa1ty7ZbKv8CCFcQABoMNDA2MjI5Mzg3ODE3IgxTmESkehujeOk%2B4S8q3ALa4iqQyQwO0b9lu7CnNfz0ioDqLA1Y%2FwPNybAjD11TC7HS6gXcL65LvXTgWpHxlKE0SmT1IBsga84cuhptRpUL8UIjipXuVtfKBMZyIX3NuTPjsBoqEGaZeMKcfH0r1MjePdYy4OZ1DixBXcu3r20TPC9m5sCyUCvp1VCAcvG5RHnLIQQq4tG8zaqR5kxzpjEN%2BvLwG1Om00Iwkx6GiX16wTumUgtFcjZap5ETNxDp2EpHviNnjzjNwC4AIuYtUlXZSK0c4Bd9WJ42FA26gHQ3znBO7EyY9d4H2kGfknCndEFNRGSnSwPtCOclrJJD2pNbQdmMjdu8IqJgOi9XpXUH4VG2xyrND8f4I%2Bv95dlX4BwPuFPyWegE4KOIEMCuC2HuAVlyz4zIY50GDFdgg4ddnW8njQAzFiOAIR8xDOpxTmeARdnXdl009Wxnh3lyY2rZgwyLsHtnqimMm74w3KzojwY6tAKXsa0qEXTF%2F6UmnMmrERrxcdY0PDC7Tlkh4qUF%2FefiChLzKz8QiU28mWCLolh2K9X9tGmqsTMlScgMMBeElmYsOtHigb4c3MmzL1E3PqH3BkV9WKeISx18ZX%2BVOGe%2BgrBKdNDSm2b8VcN9NovioU73sC7p6CC6mMVkxyy8eUp52lny9V8lmhlEXQcnZ0ZAebT%2F0bubgvrOT390p7%2FOdnL8mu8vBg0y1U%2F9WOyV9LDhrXlDFcZxYLgAPTHcWEeFAxDOzXpj2sw%2FPcaCYBuUcw1UeGzqDuBNx9mJdaKts6J9nOsX5hRnv6QhSnGpo3%2FE2HQcG0eKNfh1Im8r6EW0eGJGOkQZUHUQG6r%2FlZY%2Fv%2B6iyVB6a%2B76eqZoMALLfHtW6C%2BajeFJniI6Y4U4cnwnPAWvqURaSg%3D%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220202T053708Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAV5FJIRIUXAPMP5ED%2F20220202%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=f6363da9c6a610319334136c2dad65e9177193fdede80ec9088308dd730c1f4d' width='100' height='100' />
                        @else
                            <img src='{{ $comment->user->image }}' width='100' height='100' />
                        @endif
                        
                    @endforeach
                </div>
        @endsection
        <!--いいね機能-->
        <script type='text/javascript' src='{{ asset('js/like.js') }}'></script>
    </body>
</html>