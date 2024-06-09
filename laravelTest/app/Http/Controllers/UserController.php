<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function Login() {
        return view('Login');
    }
    function register() {
        return view('register');
    }
    function header() {
        return view('header');
    }
    
}
