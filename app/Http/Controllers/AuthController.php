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
    function newlogin(){
        auth()->logout();
        return view("auth.login");
    }
   
    function check(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('username', 'password');

        if(Auth::check()){
            return back()->with('loginmsg',"One user is already logged in!");
        }
        else{
            if (Auth::attempt($credentials)) {
                if(auth()->user()->role_id == ""){
                    auth()->logout();
                    return back()->with('msg',"Please confirm your role first!");
                }
               
                if(auth()->user()->block == 1){
                    auth()->logout();
                    return back()->with('msg',"Your account has been blocked!");
                }

                else{
                   
                    return redirect()->intended('dashboard');
                } 
            } 
            else{
                return back()->with('msg',"User credentials do not match!");
            }       
    
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

    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function changePassword(Request $request){
        $request->validate([
            "old_password" => "required",
            "password" => "required|confirmed",
        ]);

        $db_password = Auth::user()->password;
        $old_password = $request->old_password;

        if(Hash::check($old_password, $db_password)){
            $user = User::find(Auth::id());
            
            $user->password = Hash::make($request->password);
            
            $user->save();
            return back()->with('msg','Your password has been changed');

        }
        else{
            return back()->withErrors(['message'=>'Old password does not match']);
        }


        
    }
}
