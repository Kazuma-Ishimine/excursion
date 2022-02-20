<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentityProvider extends Model
{
    // $fillableプロパティ
    protected $fillable = [
        'user_id',
        'provider_name',
        'provider_id',
    ];
    
    // Userとのリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
