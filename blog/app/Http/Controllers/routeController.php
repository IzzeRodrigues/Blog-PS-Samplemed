<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    public function login(){
        return view('login');
    }
    public function registrar(){
        return view('registrar');
    }
}
