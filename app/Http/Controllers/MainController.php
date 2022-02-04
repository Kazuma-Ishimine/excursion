<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルクラスのuse宣言
use App\Service;

class MainController extends Controller
{
    // indexメソッド(サービス毎の意見投稿欄)
    public function index(Service $service)
    {
        return view('comments/index')->with(['comments' => $service->getByService()]);
    }
    
    // main.blade.phpの表示
    public function show(Service $service)
    {
        return view('main/main')->with(['service' => $service]);
    }
    
    
}
