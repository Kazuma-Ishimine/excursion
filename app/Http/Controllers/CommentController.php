<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Commentのuse宣言
use App\Comment;

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
}