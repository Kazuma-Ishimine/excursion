<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Userのuse宣言
use App\User;

# Storageのuse宣言
use Storage;

class UserController extends Controller
{
    // showメソッド(プロフィール詳細画面)
    public function show()
    {
        return view('user/show');
    }
    
    // editメソッド(プロフィール情報編集)
    public function edit()
    {
        return view('user/edit');
    }
    
    // updateメソッド(プロフィール画像編集保存)
    public function update(Request $request, User $user)
    {
        // 情報を取得
        $input = $request['post'];
        
        // 画像をs3に保存
        if (isset($input['image'])) {
            // プロフィール画像をprofile_imageとする
            $profile_image = $request['post.image'];
            // ファイル位置を取得
            $upload_info = Storage::disk('s3')->putFile('image', $profile_image, 'public');
            // ファイルのurlを取得
            $input['image'] = Storage::disk('s3')->url($upload_info);
            dd($input['image']);
        }
        
        // 上書きと保存
        $user->fill($input)->save();
        
        return redirect('/user');
    }
}
