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
    
    // fetchメソッド
    public function fetch(Request $request) {
        $decodedFetchedTweetIdList = json_decode($request->fetchedTweetIdList, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['errorMessage' => json_last_error_msg(), 500]);
            $comments = $this->commentsService->extractShowComments($decodedFetchedTweetIdList, $request->page);
            return response()->json(['comments' => $comments], 200);
        }
    }
    
    // extractShowCommentsメソッド
    public function extractShowComments($fetchedTweetIdList, $page)
    {
        $limit = 10;
        $offset = $page * $limit;
        $comments = Comment::orderBy('created_at', 'desc')->offset($offset)->take($limit)->get();
        if (is_null($comments)) {
            return [];
        }
        if (is_null($fetchedTweetIdList)) {
            return $comments;
        }
        $showableComments = [];
        foreach ($comments as $comment) {
            if (!in_array($tweet->id, $fetchedTweetIdList)) {
                $showableComments[] = $comment;
            }
        }
        return $showableComments;
    }
}
