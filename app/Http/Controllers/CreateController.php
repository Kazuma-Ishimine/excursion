<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Commentのuse宣言
use App\Comment;

# CommentRequestのuse宣言
use App\Http\Requests\CommentRequest;

class CreateController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    // indexメソッド(意見投稿一覧表示)
    public function index(Comment $comment)
    {
        return view('comments/create')->with(['comments' => $comment->getPaginateByComment()]);
    }
    
    // likeメソッド(意見に対していいねをする)
    public function like(Request $request)
    {
        Like::create([
           'comment_id' => $request->id,
           'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Comment.');
        
        return redirect()->back();
    }
    
    // unlikeメソッド(意見のいいねを取り消す)
    public function unlike(Request $request)
    {
        $like = Like::where('reply_id', $request->id)->where('user_id', Auth::id())->first();
        
        $like->delete();
        
        session()->flash('success', 'You Unliked the Comment.');
        
        return redirect()->back();
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
