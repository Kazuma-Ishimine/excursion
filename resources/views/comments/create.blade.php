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
                    @if ($comment->user->image == null)
                        <img src='/storage/s3/no-image.png' /></br>
                    @else
                        <img src='/storage/s3/{{ $comment->user->image }}' /></br>
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
        <script src='{{ asset('js/comment.js' }}'></script>
    </body>
</html>