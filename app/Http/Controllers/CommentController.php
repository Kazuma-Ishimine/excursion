<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Commentのuse宣言
use App\Comment;

# CommentRequestのuse宣言
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    // indexメソッド(意見投稿一覧の表示)
    public function index(Comment $comment)
    {
        return view('comments/index')->with(['comments' => $comment->getPaginateByComment()]);
    }
    
    // createメソッド(意見投稿作成)
    public function create()
    {
        return view('comments/create');
    }
    
    // storeメソッド(意見投稿保存)
    public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request['post'];
        $comment->fill($input)->save();
        return redirect('/comments');
    }
    
    // editメソッド(意見投稿編集)
    public function edit(Comment $comment)
    {
        return view('comments/edit')->with(['comment' => $comment]);
    }
    
    // updateメソッド(意見投稿編集保存)
    public function update(CommentRequest $request, Comment $comment)
    {
        $input_comment = $request['post'];
        $comment->fill($input_comment)->save();
        return redirect('/comments');
    }
    
    // deleteメソッド(意見投稿削除)
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/comments');
    }
}
