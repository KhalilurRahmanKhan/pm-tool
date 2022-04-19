<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;



class DashboardController extends Controller
{
    function index(){
      return view('dashboard');
    }
}
