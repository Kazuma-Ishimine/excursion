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
        return view('comments/create')->with(['comments' => $comment->getPaginateByComment()]);
    }
    
    // likeメソッド(意見に対していいねをする)
    public function like($id)
    {
        Like::create([
           'comment_id' => $id,
           'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Comment.');
        
        return redirect()->back();
    }
    
    // unlikeメソッド(意見のいいねを取り消す)
    public function unlike($id)
    {
        $like = Like::where('comment_id', $id)->where('user_id', Auth::id())->first();
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
