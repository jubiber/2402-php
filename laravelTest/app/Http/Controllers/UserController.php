<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function Login() {
        return view('Login');
    }
    function Join() {
        return view('Join');
    }
    function header() {
        return view('header');
    }
}
