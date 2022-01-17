<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Commentのuse宣言
use App\Comment;

# CommentRequestのuse宣言
use App\Http\Requests\CommentRequest;

class CreateController extends Controller
{
    // indexメソッド(意見投稿一覧表示)
    public function index(Comment $comment)
    {
        return view('comments/create')->with(['comments' => $comment->getPaginateByComment()]);
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
    
}
