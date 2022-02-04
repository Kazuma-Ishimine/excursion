<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Service extends Model
{
    // サービス一覧画面
    public function getPaginateByLimitService(int $limit_count = 5)
    {
     // updated_atで降順に並べた後、limitで件数制限をかける
     return $this::with('company')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // サービス毎の競合他社を取得
    public function getByConflicts(int $limit_count=5)
    {
        return $this->conflicts()->with('service')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // サービスごとの意見投稿を取得
    public function getByService()
    {
        dd($id);
        return $this::with('comments')->comments()->orderBy('updated_at', 'DESC')->get();
    }
    
    // Companyに対するリレーション
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    
    // Conflictに対するリレーション
    public function conflicts()
    {
        return $this->hasMany('App\Conflict');
    }
    
    // Termに対するリレーション
    public function terms()
    {
        return $this->hasMany('App\Term');
    }
    
    // Commentに対するリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}
