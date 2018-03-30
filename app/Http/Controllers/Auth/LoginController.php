<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Hash;

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
     protected function validateLogin()
    {
        $messages = [
            'email.exists' => 'Account is not active! contact Admin',
        ];

        $this->validate(request(), [
            $this->username() => 'required|exists:users,email,active,0', 'password' => 'required'
        ], $messages);
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
      /*Overriding login controller*/
    //public function login(Request $request)
  //{
    /*if(Auth::attempt([
      'email'=> $request->email,
      'password'=> $request->password,
      'active' => 0
    ]))
        {
          //Session::flash('login-success','You are Successfully logged in.');
          return redirect()->route('home');
        }
    
    $checkUser = User::where('email', $request->email)->first();
    if (Hash::check($request->password, $checkUser->password))
        {
          Session::flash('invalid-login','Your account is blocked. Contact Admin ');
          return redirect()->back();
        }

    Session::flash('invalid-login','Invalid emailid or Password.');    
    return redirect()->back();
  }*/
   
//}
}
