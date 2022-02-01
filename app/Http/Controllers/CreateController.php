<?php

namespace App\Http\Controllers;

# use宣言
use Illuminate\Http\Request;
use App\Comment; // Comment
use App\Http\Requests\CommentRequest; // CommentRequest
use App\Like; // Like
use Auth; // Auth

class CreateController extends Controller
{
    // indexメソッド(意見投稿一覧表示)
    public function index(Comment $comment)
    {
        $comments = Comment::withCount('likes')->orderBy('id', 'desc');
        $param = [
            'comments' => $comments,    
        ];
        return view('comments/create', $param);
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
    
}
