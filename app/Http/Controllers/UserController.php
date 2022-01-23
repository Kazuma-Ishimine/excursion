<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Userのuse宣言
use App\User;

# Storageのuse宣言
use Storage;

class UserController extends Controller
{
    // updateメソッド(プロフィール画像編集保存)
    public function update(Request $request, User $user)
    {
        // プロフィール画像の取得、バリデーション無し
        $profile_image = $request['post'];
        dd($$request);
        // バケットの'myportfolioimage'ファルダにアップロード
        $file_path = Storage::disk('s3')->put('/myportfolioimage/', $profile_image,'public');
        // アップロードした画像のフルパスを取得
        $profile_image = Storage::disk('s3')->url($file_path);
        // 上書きして保存
        $user->save();
        return view('user/show');
    }
}
