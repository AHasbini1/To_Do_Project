<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
  
  
    }

    public function store(RegisterRequest $request)
    {
        
        $data = $request ->all();
            $data['password']=bcrypt($data['password']);// this is how you encrypt passwords
            $data['remember_token']=(string) Str::uuid();// this generates a unique ID
        $user=User:: create($data);
        Auth::login($user);//create users and make sure they`re logged in
        

        return redirect('/');

    }

}
    