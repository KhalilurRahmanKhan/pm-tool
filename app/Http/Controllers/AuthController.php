<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;




class AuthController extends Controller
{
    function login(){
        return view("auth.login");
    }
   
    function check(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('username', 'password');

        
            if (Auth::attempt($credentials)) {
                if(auth()->user()->role == "new"){
                    return back()->with('msg',"Please confirm your role first!");
                }
                else{
                    return redirect()->intended('dashboard');
                } 
            } 
            else{
                return back()->with('msg',"User credentials do not match!");
            }       
        
        
       
    }
   
    function registration(){
        return view("auth.registration");
    }
    function store(Request $request){
        $request->validate([
            "username" => "required",
            "password" => "required|confirmed",
        ]);
        User::create([
            "username" => "$request->username",
            "password" => Hash::make($request->password),
        ]);
       
        
        return back()->with('msg','Wait for your role confirmation!');



    }
}