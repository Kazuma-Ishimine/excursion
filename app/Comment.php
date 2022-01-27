<?php

namespace App;

# use宣言
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // SoftDeletes
use Auth; // Auth

class Comment extends Model
{
    // deleteメソッドが実行されると、論理削除が行われるようにする
    use SoftDeletes;
    
    # $fillableプロパティ
    protected $fillable =[
        'body',
        'review',
        'user_id'
    ];
        
    // 意見投稿一覧画面(paginateで件数制限)
    public function getPaginateByComment(int $limit_count = 5)
    {
        return $this::with(['user'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // Userに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // Likeに対するリレーション
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = [];
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
