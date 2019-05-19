<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //メソッド実行直後のリダイレクト先
    protected $redirectTo = '/tweets';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //ログイン出来た時のリダイレクト先の指定
        $this->loginPath = route('tweets.index');
        $this->redirectAfterLogout = route('auth.getLogout');
    }

    public function logout(\Illuminate\Http\Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        /**ログアウトのリダイレクト先 */
        return $this->loggedOut($request) ?: redirect('/tweets');
    }
    /**名前情報を打たないとログインできなくなってしまうのでemailとパスワードでユーザー認証出来るようにする為のメソッド */
    public function username()
    {
        return 'email';
    }
}
