<?php

namespace App\Http\Controllers;

use AuthenticatesUsers;
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

    // 로그인 성공 후 리디렉션할 경로
    protected $redirectTo = '/board';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
