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
        'review'
        ];
        
    // 意見投稿一覧画面(paginateで件数制限)
    public function getPaginateByComment(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
