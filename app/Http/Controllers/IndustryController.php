<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Industryモデルのuse宣言
use App\Industry;

class IndustryController extends Controller
{
    // indexメソッド(業界毎の企業一覧の表示)
    public function index(Industry $industry)
    {
        return view('industries/index')->with(['companies' => $industry->getByCompany()]);
    }
}
