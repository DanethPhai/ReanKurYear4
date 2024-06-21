<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Closure;
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

    // public function handle(Request $request, Closure $next)
    // {
    //     if(Auth::check()) {
    //         // 1 == admin
    //         // 0 == user
    //         if(Auth::user()->role_as == '1') {
    //             return redirect('/admin/products');
    //         }
    //         else {
    //             return  redirect('/home')->with('message', 'Access Denied As You are not An Admin');
    //         }
    //     }


    //     else {
    //         return redirect('/login')->with('message', 'Please Login First');
    //     }

    // }

//     protected function authenticated(Request $request, $user)
// {
//     if ($user->role === 'admin') {
//         return redirect('/dashboard');
//     }

//     return redirect('/home');
// }


public function handle(Request $request, Closure $next)
{
    if(Auth::check()) {
        // 1 == admin
        // 0 == user
        if(Auth::user()->role_as == '1') {
            return $next($request);
        }
        else {
            return  redirect('/home')->with('message', 'Access Denied As You are not An Admin');
        }
    }
}
}
