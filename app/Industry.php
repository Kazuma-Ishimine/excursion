<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    // 業界毎に企業名を取得
    public function getByCompany(int $limit_count=5)
    {
        return $this->companies()->with('industry')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    // Companyに対するリレーション
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
