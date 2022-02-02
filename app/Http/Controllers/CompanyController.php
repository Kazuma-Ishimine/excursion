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
    
    // createメソッド(意見投稿作成)
    public function create()
    {
        return view('companies/create');
    }
    
    // storeメソッド(意見投稿保存)
    public function store(Request $request, Company $company)
    {
        $input = $request['company'];
        
        // 画像をs3に保存
        if ($request->file('image')) {
            // プロフィール画像をprofile_imageとする
            $company_logo  = $request->file('image');
            // ファイル位置を取得
            $upload_info = Storage::disk('s3')->putFile('myportfolioimage', $company_logo, 'public');
            // ファイルのurlを取得
            $input['image'] = Storage::disk('s3')->url($upload_info);
        }
        
        $company->fill($input)->save();
        return redirect('/companies/'.$company->id);
    }
}
