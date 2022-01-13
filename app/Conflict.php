<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    // Serviceに対するリレーション
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
