<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Serviceモデルクラスの作成
use App\Service;

class ServiceController extends Controller
{
    // サービス一覧を表示
    public function index(Service $service)
    {
        return view('services/index')->with(['services' => $service->getPaginateByLimitService()]);
    }
    // サービス詳細を表示
    public function show(Service $service)
    {
        return view('services/show')->with(['service' => $service]);
    }
}
