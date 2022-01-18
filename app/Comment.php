<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

# SoftDeletesのuse宣言
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
