<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    // Serviceに対するリレーション
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
