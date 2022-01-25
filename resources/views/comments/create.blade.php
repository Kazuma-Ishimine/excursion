<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset('css/comment.css') }}'>
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
                    <!--いいね-->
                    <!--<div class='likes'>-->
                    <!--    if$comment->is_liked_by_auth_user())-->
                    <!--        <a href='' class='bth bth-success btn-sm'>いいね<span class='badge'>{ $comment->likes->count() }}</span></a>-->
                    <!--    else-->
                    <!--        <a href='' class='bth bth-success btn-sm'>いいね<span class='badge'>{ $comment->likes->count() }}</span></a>-->
                    <!--    endif-->
                    <!--</div>-->
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
                <!--いいねの数入力-->
                <div class='review'>
                    <h2>いいねの数(仮)</h2>
                    <!--いいねの数_仮_入力-->
                    <input type='number' name='post[review]' value='{{ old('post.review') }}' />
                    <!--
                    入力エラー時、CommentRequestクラスで設定された
                    入力エラーメッセージを対象項目の下にそれぞれ表示
                    -->
                    <p class='review-error' style='color:red'>{{  $errors->first('post.review') }}</p>
                </div>
                <!--入力内容を送信するボタン-->
                <input type='submit' value='投稿' />
            </form>
            
            <!--意見投稿を辞める-->
            <div class='reject'>[<a href='/comments'>辞める</a>]</div>
        @endsection
        
        <!--JavaScriptの処理-->
        <script>
            const delete_buttons = document.getElementsByClassName('delete_button');
            Array.prototype.forEach.call(delete_buttons,delete_button=>
                delete_button.addEventListener('click', function(e) {
                    const form_id = 'form_' + e.target.id;
                    var dialog_bool = window.confirm('削除しますか?');
                    if (dialog_bool === true) {
                        document.getElementById(form_id).submit();
                    } else {
                        return false;
                    }
                }));
        </script>
        
    </body>
</html>