<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Serviceモデルクラスのuse宣言
use App\Service;

class ServiceController extends Controller
{
    // サービス一覧を表示
    public function index(Service $service)
    {
        return view('services/index')->with(['services' => $service->getPaginateByLimitService()]);
    }
    
}
