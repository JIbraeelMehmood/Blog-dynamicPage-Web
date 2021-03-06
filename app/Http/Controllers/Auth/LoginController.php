<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Post;
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
    #ByDefault ->protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() 
    {
      if (!Auth::user()->status == 1) 
      {
        Auth::logout();
        return redirect('/')->withError('Please activate your account before logging in.');
      }else
      {
        $role = Auth::user()->role; 
        $name = Auth::user()->name; 
        switch ($role) 
          {
            case 'admin':
              notify()->success('Welcome Back '.$name.' ⚡️', 'Sign Up');
              #drakify('success'); // for success alert 
              return '/admin_dashboard';
              break;
            case 'user':
              notify()->success('Welcome Back '.$name.' ⚡️', 'Sign Up');
              return '/user_dashboard';
              break; 
            default:
              return '/visiters'; 
            break;
          }
      }
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
