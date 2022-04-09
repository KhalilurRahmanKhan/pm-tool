<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    function login(){
        return view("auth.login");
    }
   
    function registration(){
        return view("auth.registration");
    }
}
