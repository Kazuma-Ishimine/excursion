<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    // Companyに対するリレーション
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
