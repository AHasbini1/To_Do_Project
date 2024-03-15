<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
//use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    } 
    
    public function login(LoginRequest $request){
        $data = $request->all(); 
        $email=$data['email'];
        $password=$data['password'];
        $credentials=[  'email'=>$email, 'password'=>$password];
        #dd($credentials);
//$credentials = [$data['email'], $data['password']];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();// make sure the session has the logged-in user
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


    }  
    
    
    public function logout(Request $request){
        Auth::logout();
         //Request::session()->invalidate();// it makes sure the session does not include the logged-out user
         $request::session()->invalidate();
        return redirect('/login');

    }
        
}
