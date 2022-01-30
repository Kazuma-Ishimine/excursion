<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>意見投稿一覧と作成(仮)</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--親ビューを継承したヘッダー-->
        @extends('layouts.app')
        
        <!--子ビュー固有のパーツ-->
        @section('content')
            <!--投稿件数を表示-->
            <h2>投稿件数</h2>
            <div class='comment-number'>全{{ $comments->count() }}件</div>
            <!--意見投稿一覧を表示-->
            <template>
                <h2>意見投稿</h2>
                <div class='comments'>
                    @foreach ($comments as $comment)
                        <!--投稿内容-->
                        <div class='comment'>
                            <p class='body'>{{ $comment->body }}(本文)</p>
                            <p class='update-day'>{{ $comment->updated_at }}(更新日)</p>
                        </div>
                        <!--ユーザー名-->
                        <div class='user-name'>{{ $comment->user->name }}</div>
                        <!--プロフィール画像-->
                        @if($comment->user->image === null)
                            <img src='https://myportfolioimage.s3.ap-northeast-1.amazonaws.com/no-image.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEND%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDmFwLW5vcnRoZWFzdC0xIkcwRQIhALzhe3myR81rTCX0VVbLWoQIPSniTsx05m6S8uFTtAMEAiAxslj42o86WtkKCMQhBMwEPJrZit%2FEP%2BMc7VLdXe6JkSqIAwj5%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAAaDDQwNjIyOTM4NzgxNyIM9kYnmkPGzYGhXUEfKtwCWKejdkrUYTpPOb6fPuYwkf046HwIW6%2BYe56Uo7L3%2BfpsiA0MrPDpyhqTqZ7LAjm4BcpRFi%2Bsl78WBIawR8ep0xmpKQtC9wU6blb%2BbVqoZA8N4OdPF8RLfV6pcS2q23CCRBw0x6BtWeD9o18LS2Y2ALfOxaKXQk1Kb9yxELBclst29UoNryX%2FwjHHJvDn6CD9Ofd47OU15s4s6dr6I3NeGunITVFFVJ0Q0lFsRSXWdsbZYbHdgL6ExAcC1DPdWjF9OMy7WI0pQAc3kZWtdDUrKd8aDrPYCntpRDqQfqvBajLCT2%2Bpt%2B3IX23Qyt8pRrNom5%2FnwbF5ZiiAyA4s7vsHp%2F7Zqs7B2ywEgs8M9pZTFGyo%2FrVmnpIzUPfjg9JPooQy7idm95R9Y3PiCmiAGv%2BQJLNYWY0FMLVy%2FeJWe9aYdgCk3kPPiaVzBUOBX0BcW8UAVGSynu9vRK6Lo4GAMJyr148GOrMCp2ldE4xbqfZ%2FIOwMGEckKhUu%2BUhXf6CYgxT43Fe2n1n2lefhWsnCu0U%2FSWSUYtBYNrOofoNX0D4m2avzcg4yDcMu%2B5XzYwqB9SscXAsKoJD1DRADgRQIru4FkcxJvDIJFuR2bl6hIwbOKRUWbKMusHQviiOeagavurrFFpmMEOOeYO3OzVDzOjJPpCq4Yylk1%2B2NWASHZbJOJ%2BWwiA5cyPr5WQGY2j23r6chkRI9PC9b3QvI2jYE%2FACwEEOktACJxr468xaNtJMUEPvzrMqetU9YJX3G3Ag1BKbR9%2Faf9gDynwOBG8bJHc9fGBIsWAtaHVrjeLLC0rjBku9LRQe%2BXiMwDZe0khdcRgI9QAZtWI7WNgxL2VI2rqXOFODb%2FdLQvJoaMGBnvQjn55OtzIn8CWtRzg%3D%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220130T013458Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAV5FJIRIUYAXB6SOL%2F20220130%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=bb757b0ff898ee1ffee1e48dd2d054f66761b744483c510db67a02e57acb7899' width='100' height='100' />
                        @else
                            <img src='{{ $comment->user->image }}' width='100' height='100' />
                        @endif
                    @endforeach
                </div>
                <infinite-loading @infinite='infiniteHandler'></infinite-loading>
            </template>
        @endsection
        <!--infinite-loadingを使うためのCDN-->
        <script src="https://unpkg.com/vue-infinite-loading@^2/dist/vue-infinite-loading.js"></script>
        <!--無限スクロールのコード-->
        <script type='text/javascript' src='{{ asset('js/infinite.js') }}'></script>
    </body>
</html>