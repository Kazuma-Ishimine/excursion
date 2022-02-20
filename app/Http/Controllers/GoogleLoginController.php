<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth;
use App\User; // User
use Socialite; // Socialite


class GoogleLoginController extends Controller
{
    // Googleの認証ページへユーザーをリダイレクト
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    // Googleアカウント操作
    public function handleGoogleCallback()
    {
        // Googleからユーザー情報を取得、ステートレスな認証
        $google_user = Socialite::driver('google')->stateless()->user();
        // emailが合致するユーザーの取得
        $user = User::where('email', $google_user->email)->first();
        // 見つからない時に、新しくユーザーを作成
        if ($user === null) {
            $user = $this->createUserByGoogle($google_user);
        }
        dd($google_user);
        // ログイン処理
        \Auth::login($user, true);
        return redirect('/services');
    }
    
    // Googleアカウントで登録
    public function createUserByGoogle($google_user)
    {
        $user = User::create([
            'name' => $google_user->name,
            'email' => $google_user->email,
            // パスワードの初期値をuniqid()で生成して、ハッシュ化
            'password' => \Hash::make(uniqid()),
            ]);
        return $user;
    }
    
}
