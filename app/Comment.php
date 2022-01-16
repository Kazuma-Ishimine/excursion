<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
