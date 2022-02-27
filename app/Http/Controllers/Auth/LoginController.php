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
    
    # reCAPTCHA
    
    
    # SNSログイン
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    /**
     * Obtain the user information from Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        // ログイン成功の判断
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $exception) {
            return redirect('/login');
        }
        
        $auth_user = $this->findOrCreateUser($user, $provider);
        
        // 認証処理
        Auth::login($auth_user, true);
        
        // トップページへリダイレクト
        return redirect()->to($this->redirectTo);
        
    }
    
    public function findOrCreateUser($user, $provider)
    {
        $auth_user = User::where('provider_id', $user->id)->first();
        if ($auth_user) {
            return $auth_user;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => \Hash::make(uniqid()),
            'provider_name' => $provider,
            'provider_id' => $user->id
        ]);
    }
    
    // ログアウト後の画面遷移
    protected function loggedOut()
    {
        return redirect('/login');
    }
    
}
