<?php

namespace App\Http\Controllers;

use App\Models\User;
use AuthenticatesUsers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function login(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('email', 'password')
            ,[
                'email' => ['required', 'email', 'max:50']
                ,'password' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9!@]+$/'
            ]
        );
        if($validator->fails()) {
            return redirect()
                    ->route('get.login')
                    ->withErrors($validator->errors());
        }

        // 유저 정보 습득
        $resultUserInfo = User::where('email', $request->email)->first();
        $errorMsg='';

        if(is_null($resultUserInfo)) {
            // 회원 존재 여부 체크
            $errorMsg= '존재하지 않는 회원입니다.';
        }
        else {
            // 비밀번호 일치 체크
            if(!(Hash::check($request->password, $resultUserInfo->password))) {
                $errorMsg = '비밀번호가 일치하지 않습니다.';
            }
        }
        if($errorMsg !== '') {
            return redirect()
                    ->route('get.login')
                    ->withErrors($errorMsg);
        }
    
        // 유저 인증 처리
        Auth::login($resultUserInfo);
        // Auto::id() : 로그인한 유저 pk 획득
        // Auto::user() : 로그인한 유저 정보 획득
        // Auto::check() : 현재 로그인 중인지 체크

        return redirect()->route('board.index');
    }
    // 로그아웃 처리
    public function logout() {
        Auth::logout(); // 로그아웃

        // Session 객체이용
        Session::invalidate(); // 기존 세션의 모든 데이터 제거 후 새로운 세션 ID를 발급
        Session::regenerateToken(); // CSRF 토큰 재발급

        return redirect()->route('get.login');
    }

    // 회원가입  처리
    public function register(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'max:50']
            ,'password' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9!@]+$/'
            ,'name' => ['required', 'regex:/^[가-힣]{2,30}$/u']
        ]);
        // 회원 정보 가공
        $insertData = $request->only('email', 'password', 'name');
        $insertData['password'] = Hash::make($insertData['password']);

        User::create($insertData);

        return redirect()->route('get.login');
    }

    // 이메일 중복 체크
    public function emailChk(Request $request) {
        try {
            $responseData = [
                'errorFlg' => true
                ,'emailFlg' => false
                ,'errorMsg' => ''
            ];

            // 유효성 검사
            $validation = Validator::make(
                $request->only('email'),
                [
                    'email' > ['required', 'email', 'max:50']
                ]
            );

            if($validation->fails()) {
                throw new Exception('유효성 체크 에러');
            }
            // ------------
            // 이메일 체크
            // ------------
            $resultEmail = User::select('id')
                                ->where('email', $request->email)
                                ->first();
            if(!is_null($resultEmail)) {
                $responseData['emailFlg'] = true;
                $httpStatus = 200;
                throw new Exception('이메일 중복');   
            }
            // 정상 처리(사용가능 email)
            $responseData['errorFlg'] = false;
            $responseData['emailFlg'] = false;
            $httpStatus = 200;
        } catch (\Throwable $th) {
            $responseData['errorFlg'] = true;
            $responseData['errorMsg'] = $th->getMessage();
        } finally {
            return response()->json($responseData);
        }
        }
    }



  
