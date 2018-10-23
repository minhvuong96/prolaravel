<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
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
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'username';
    }
    public function login(Request $request){
        $login = array(
            'username'=> $request->username,
            'password'=> $request->password,
            'level'=> 1
        );
        if(Auth::attempt($login)){
            return redirect()->route('admin.cate.getList');
        }else{
            return redirect()->back()->with(['flash_message'=>'Username hoặc Password không đúng.']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
