<?php

namespace SIPAE\Http\Controllers\Auth;

use SIPAE\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/institucion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function index(){
        return view('auth.loginSecretaria');
    }

    /**
     * 
     * 
     */
    public function login(Request $request){
         
        $credentials = $request->only('email', 'password');

        
        print_r($credentials);
         if (Auth::attempt($credentials)) {
             echo Auth::user();
             echo 'esta en login';
        //     return redirect()->intended('institucion');
         }else{
        //     return $request->expectsJson()
        //         ? response()->json(['message' => $exception->getMessage()], 401)
        //         : redirect()->guest(Route('inicio'));
         }
    }

    public function showLoginForm()
    {
        return view('auth.loginSecretaria');
    }
    
     /**
     * Logout, Clear Session, and Return.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
