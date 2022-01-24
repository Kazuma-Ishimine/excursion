<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // $fillableプロパティ
    protected $fillable = [
            'comment_id',
            'user_id',
    ];
        
    // Commentとのリレーション
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
    // Userとのリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
