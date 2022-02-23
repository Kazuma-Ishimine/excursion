<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;  // Auth
use Socialite;  // Socialite
use App\User;  // User

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        // ログイン成功の判断
        try {
            $social_user = Socialite::driver($provider)->user();
        } catch (\Exception $exception) {
            return redirect('/login');
        }
        
        // ユーザー情報の検索
        $user = User::where([
            'provider_id' => $social_user->getId(),
            'provider_name' => $provider
        ])->first();
        
        // ユーザー情報の新規作成
        if (!$user) {
            $user = User::create([
                'name' => $social_user->getNickname(),
                'email' => $social_user->getEmail(),
                'provider_id' => $social_user->getId(),
                'provider_name' => $provider   
            ]);
        }
        
        // 認証処理
        auth()->login($user, true);
        
        // トップページへリダイレクト
        return redirect()->to($this->redirectTo);
        
    }
    
    // ログアウト後の画面遷移
    protected function loggedOut()
    {
        return redirect('/login');
    }
    
}
