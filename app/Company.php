<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Serviceに対するリレーション
    public function services()
    {
        return $this->hasMany('App\Servie');
    }
    
    // Industryに対するリレーション
    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }
}
