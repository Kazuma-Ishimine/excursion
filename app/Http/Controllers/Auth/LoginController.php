<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;  // Auth
use Socialite;  // Socialite
use App\User;  // User
use App\IdentityProvider;  // IdentityProvider

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
    
    // ユーザーをOAuthプロバイダにリダイレクトする
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }
    
    // 認証後にプロバイダからのコールバックを受け取る
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }
        
        $auth_user = $this->findOrCreateUser($user, $provider);
        Auth::login($auth_user, true);
        return redirect($this->redirectTo);
    }
    
    // ユーザーを探す
    public function findOrCreateUser($provider_user, $provider)
    {
        $account = IdentityProvider::whereProviderName($provider)
                    ->whereProviderId($provider_user->getId())
                    ->first();
        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($provider_user->getEmail())->first();
            
            if (!$user) {
                $user = User::create([
                   'email' => $provider_user->getEmail(),
                   'name' => $provider_user->getName(),
                
                ]);
            }
            
            $user->IdentityProviders()->create([
                'provider_id' => $provider_user->getId(),
                'provider_name' => $provider,
            ]);
            
            return $user;
        }
    }
    
    // ログアウト後の画面遷移
    protected function loggedOut()
    {
        return redirect('/login');
    }
    
}
