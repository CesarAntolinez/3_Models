<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

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
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('correo', 'password');

        if (Auth::attempt(['correo' => $credentials->correo, 'password' =>  $credentials->password, 'status' => 1])) {
            // Authentication passed...
            return redirect()->route('home');
        }
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return $this->guard()->attempt(
            ['correo' => $credentials['email'], 'password' =>  $credentials['password'], 'status' => 1], $request->filled('remember')
        );
    }

    public function username()
    {
        return 'email';
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }


}
