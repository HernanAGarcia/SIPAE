<?php

namespace SIPAE\Http\Controllers\Auth;

use SIPAE\Http\Controllers\Controller;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/secretaria';

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
        
         if (Auth::attempt($credentials) && Auth::user()->role=='secretaria') {
          
           return redirect()->intended('secretaria');
           
         }else if(Auth::attempt($credentials) && Auth::user()->role=='institucion'){
            
            return redirect()->intended('institucion');
        
         }else if(Auth::attempt($credentials) && Auth::user()->role=='operador'){
            
            return redirect()->intended('operador');
        
         }
         else{

            alert()->error('Correo y/o Cotraseña Invalidas', 'Error')->persistent('Close');
            return redirect()->guest(Route('inicio'));
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
