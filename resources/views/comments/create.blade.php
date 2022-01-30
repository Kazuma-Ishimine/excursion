<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--後で調べる-->
        <meta name='csrf-token' content='{{ csrf_token() }}'>
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--意見投稿一覧を表示-->
            <div class='comments'>
                @foreach($comments as $comment)
                    <!--投稿内容-->
                    <div class='comment'>
                        <p class='body'>{{ $comment->body }}(本文)</p>
                        <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                    </div>
                    
                    <!--いいね機能-->
                    @if (!$comment->isLikedBy())
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
                    
                    <!--編集画面への遷移-->
                    <div class='comment-edit'>[<a href='/comments/{{ $comment->id }}/edit'>編集</a>]</div>
                    <!--投稿削除-->
                    <form action='/comments' id='form_{{ $comment->id }}' method='POST' style='display:inline'>
                        @csrf
                        @method('DELETE')
                        <div class='delete-button'>
                            <button type='button' id='{{ $comment->id }}'>意見投稿削除</button>
                        </div>
                    </form>
                    <!--投稿者のプロフィール画像を表示-->
                    @if($comment->user->image === null)
                        <img src='https://myportfolioimage.s3.ap-northeast-1.amazonaws.com/no-image.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEND%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIkcwRQIhALzhe3myR81rTCX0VVbLWoQIPSniTsx05m6S8uFTtAMEAiAxslj42o86WtkKCMQhBMwEPJrZit%2FEP%2BMc7VLdXe6JkSqIAwj5%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAAaDDQwNjIyOTM4NzgxNyIM9kYnmkPGzYGhXUEfKtwCWKejdkrUYTpPOb6fPuYwkf046HwIW6%2BYe56Uo7L3%2BfpsiA0MrPDpyhqTqZ7LAjm4BcpRFi%2Bsl78WBIawR8ep0xmpKQtC9wU6blb%2BbVqoZA8N4OdPF8RLfV6pcS2q23CCRBw0x6BtWeD9o18LS2Y2ALfOxaKXQk1Kb9yxELBclst29UoNryX%2FwjHHJvDn6CD9Ofd47OU15s4s6dr6I3NeGunITVFFVJ0Q0lFsRSXWdsbZYbHdgL6ExAcC1DPdWjF9OMy7WI0pQAc3kZWtdDUrKd8aDrPYCntpRDqQfqvBajLCT2%2Bpt%2B3IX23Qyt8pRrNom5%2FnwbF5ZiiAyA4s7vsHp%2F7Zqs7B2ywEgs8M9pZTFGyo%2FrVmnpIzUPfjg9JPooQy7idm95R9Y3PiCmiAGv%2BQJLNYWY0FMLVy%2FeJWe9aYdgCk3kPPiaVzBUOBX0BcW8UAVGSynu9vRK6Lo4GAMJyr148GOrMCp2ldE4xbqfZ%2FIOwMGEckKhUu%2BUhXf6CYgxT43Fe2n1n2lefhWsnCu0U%2FSWSUYtBYNrOofoNX0D4m2avzcg4yDcMu%2B5XzYwqB9SscXAsKoJD1DRADgRQIru4FkcxJvDIJFuR2bl6hIwbOKRUWbKMusHQviiOeagavurrFFpmMEOOeYO3OzVDzOjJPpCq4Yylk1%2B2NWASHZbJOJ%2BWwiA5cyPr5WQGY2j23r6chkRI9PC9b3QvI2jYE%2FACwEEOktACJxr468xaNtJMUEPvzrMqetU9YJX3G3Ag1BKbR9%2Faf9gDynwOBG8bJHc9fGBIsWAtaHVrjeLLC0rjBku9LRQe%2BXiMwDZe0khdcRgI9QAZtWI7WNgxL2VI2rqXOFODb%2FdLQvJoaMGBnvQjn55OtzIn8CWtRzg%3D%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220130T013458Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAV5FJIRIUYAXB6SOL%2F20220130%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=bb757b0ff898ee1ffee1e48dd2d054f66761b744483c510db67a02e57acb7899' width='100' height='100' />
                    @else
                        <img src='{{ $comment->user->image }}' width='100' height='100' />
                    @endif
                    <!--投稿者の名前情報を表示-->
                    <small>{{ $comment->user->name }}</small>
                @endforeach
            </div>
            
            <!--ページネーションのリンク-->
            <div class='paginate'>
                {{ $comments->links() }}
            </div>
            
            <!--意見投稿の作成-->
            <!--入力フォーム-->
            <form action='/comments' method="POST">
                <!--csrfトークンフィールド-->
                @csrf
                <!--内容入力-->
                <div class='body'>
                    <h2>意見投稿内容</h2>
                    <!--内容入力用テキストエリア-->
                    <textarea name='post[body]' placeholder='意見投稿'>{{ old('post.body') }}</textarea>
                    <!--
                    入力エラー時、CommentRequestクラスで設定された
                    入力エラーメッセージを対象項目の下にそれぞれ表示
                    -->
                    <p class='body-error' style='color:red'>{{ $errors->first('post.body') }}</p>
                </div>
                <!--入力内容を送信するボタン-->
                <input type='submit' value='投稿' />
            </form>
            
            <!--意見投稿を辞める-->
            <div class='reject'>[<a href='/comments'>辞める</a>]</div>
        @endsection
        
        <!--JavaScriptファイル-->
        <script type='text/javascript' src='{{ asset('js/comment.js') }}'></script>
    </body>
</html>