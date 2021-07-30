<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/hotel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$admin=User::get();
		if($admin->isEmpty()){
			$newadmin=new User;
			$newadmin->id=1;
			$newadmin->name='admin';
			$newadmin->email='admin@gmail.com';
			$newadmin->password=bcrypt('adminadmin');
			$newadmin->save();
		}
        $this->middleware('guest')->except('logout');
    }
}
