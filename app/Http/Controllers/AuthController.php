<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{
    public function login(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);        
        if(Auth::attempt($data))
        {
            return redirect('/');  
        }
    
        return redirect('/login')->withErrors(['error'=>'Неверный логин или пароль']);
    }  

    public function register(RegisterRequest $request)
    {
        $data=$request->only(['name','email','password']);
        User::create($data);
        return redirect('/login');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
 }   