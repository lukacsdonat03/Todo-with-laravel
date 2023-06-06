<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function register(){
        return view('register');
    }
    
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(!$newUser){
            return redirect(route('register'))->with('error','Registration details are not valid');
        }
        return redirect(route('login'))->with('success','Reistration was successful');
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('home')->with('success','Logged in successfully');
        }
        return redirect(route('login'))->with('error','Invalid credentials...');
    }
    
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}

