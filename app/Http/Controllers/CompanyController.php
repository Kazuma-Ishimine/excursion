<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company; // Company

class CompanyController extends Controller
{
    // showメソッド
    public function show(Company $company)
    {
        return view('companies/show')->with(['company' => $company]);
    }
    
}
