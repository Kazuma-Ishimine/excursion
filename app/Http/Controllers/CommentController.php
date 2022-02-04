<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment; // Comment
use App\Service; // Service
use App\Http\Requests\CommentRequest; // CommentRequest

class CommentController extends Controller
{
    // indexメソッド(意見投稿一覧の表示)
    public function index(Request $request)
    {
        $comment = Comment::withCount('likes')->orderBy('updated_at', 'DESC')->get();
        $param = [
            'comments' => $comment,    
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
    public function create(Service $service)
    {
        return view('comments/create')->with(['services' => $service->get()]);
    }
    
    // storeメソッド(意見投稿保存)
    public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];
        $comment->fill($input)->save();
        return redirect('/comments/create');
    }
    
    // editメソッド(意見投稿編集)
    public function edit(Comment $comment)
    {
        return view('comments/edit')->with(['comment'=> $comment]);
    }
    
    // updateメソッド(意見投稿編集保存)
    public function update(CommentRequest $request, Comment $comment)
    {
        $input_comment = $request['comment'];
        $input_comment += ['user_id' => $request->user()->id];
        $comment->fill($input_comment)->save();
        return redirect('/comments/create');
    }
    
    // deleteメソッド(意見投稿削除)
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/comments/create');
    }
}
