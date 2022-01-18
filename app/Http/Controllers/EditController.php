<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Commentのuse宣言
use App\Comment;

# CommentRequestのuse宣言
use App\Http\Requests\CommentRequest;

class EditController extends Controller
{
    // indexメソッド(意見投稿一覧表示)
    public function index(Comment $comment)
    {
        return view('comments/edit')->with(['comments' => $comment->getPaginateByComment()]);
    }
    
    // editメソッド(意見投稿編集)
    public function edit(Comment $comment)
    {
        return view('comments/edit')->with(['comments'=> $comment] );
    }
    
    // updateメソッド(意見投稿編集保存)
    public function update(CommentRequest $request, Comment $comment)
    {
        $inupt_comment = $request['post'];
        $input_comment += ['user_id' => $request->user()->id];
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
