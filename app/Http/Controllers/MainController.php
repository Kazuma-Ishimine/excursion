<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルクラスのuse宣言
use App\Service;
use App\Conflict;
use App\Term;

class MainController extends Controller
{
    // main.blade.phpの表示
    public function show(Service $service, Conflict $conflict, Term $terms)
    {
        return view('main/main')->with(['service' => $service, 'conflicts' => $conflict, 'terms' => $terms]);
    }
}
