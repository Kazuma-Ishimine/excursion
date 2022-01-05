<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Serviceモデルクラスの作成
use App\Service;

class ServiceController extends Controller
{
    // Service一覧を表示
    public function index(Service $service)
    {
        return $service->get();
    }
}
