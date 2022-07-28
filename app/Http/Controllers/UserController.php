<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){

  
        $validate=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return redirect()->intended('login');
        }
    }
    public function dashboard(){
        return view('admin.layouts.layout');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
