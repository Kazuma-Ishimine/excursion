<?php

namespace App;

# use宣言
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // SoftDeletes

class Comment extends Model
{
    // deleteメソッドが実行されると、論理削除が行われるようにする
    use SoftDeletes;
    
    # $fillableプロパティ
    protected $fillable =[
        'body',
        'service_id',
        'user_id',
    ];
        
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
    
    // Serviceに対するリレーション
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    
    // isLikedByメソッド(いいねされているか判定)
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('comment_id', $this->id)->first() !== null;
    }
}
