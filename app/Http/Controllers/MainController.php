<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルクラスのuse宣言
use Service;
use Conflict;
use Term;

class MainController extends Controller
{
    // main.blade.phpの表示
    public function show(Service $service, Conflict $conflict, Term $terms)
    {
        return view('home/main')->with(['service' => $service, 'conflicts' => $conflict, 'terms' => $terms]);
    }
}
