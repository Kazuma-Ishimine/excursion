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
        $comments = Comment::withCount('likes');
        $param = [
            'comments' => $comments,    
        ];
        return view('comments/index', $param);
    }
    
    // likeメソッド
    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $comment_id = $request->comment_id;
        $already_liked = Like::where('user_id', $user_id)->where('comment_id', $comment_id)->first();
        
        if (!$already_liked) {
            $like = new Like;
            $like->comment_id = $comment_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('comment_id', $comment_id)->where('user_id', $user_id)->delete();
        }
        
        $comment_likes_count = Comment::withCount('likes')->findOrFail($comment_id)->likes_count;
        $param = [
            'comment_likes_count' => $comment_likes_count,
        ];
        
        return response()->json($param);
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
        $input += ['user_id' => $request->user()->id];
        $comment->fill($input)->save();
        return redirect('/comments');
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
