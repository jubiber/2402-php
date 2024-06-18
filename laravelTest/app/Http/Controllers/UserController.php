<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    // 로그인 폼 표시
    public function showLoginForm()
    {
        return view('login');
    }

    // 로그인 처리
    public function login(Request $request)
    {
    // email, password -> Login.blade.php의 input 태그의 name 속성
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 인증 성공
            return redirect()->route('board'); // 로그인 후 이동할 경로
        } else {
            // 인증 실패 처리
            return back()->withErrors(['email' => '이메일 또는 비밀번호가 일치하지 않습니다.']);
        }
    }


    // 로그아웃 처리
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }

    // 회원가입 폼 표시
    public function showRegisterationForm()
    {
        return view('register');
    }

    // 회원가입  처리
    public function register(Request $request)
    {
        //유효성 검사
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_chk' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'nickname' => 'required|string|max:255|unique:users',
        ]);

        //사용자 생성

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'nickname' => $request->input('nickname'), 
        ]);

        // 회원가입 성공 후 로그인 페이지로 리다이렉트
        return redirect()->route('login.get')->with('success', '회원가입이 완료되었습니다. 로그인해주세요');
    }




}
