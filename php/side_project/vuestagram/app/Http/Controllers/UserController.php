<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Http\Middleware\MyAuth;
use App\Models\User;
use MyUserValidate;
use MyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller {

    public function login(Request $request) {
        // (출력할 문자열 파라미터, 배열파라미터)
        Log::debug('Start Login', $request->all());


        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];

        //유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);
        
        //유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('login Validation Error', $resultValidate->errors()->all());
           throw new MyValidateException('E01'); 
        }

        //유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                ->withCount('boards')
                                ->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            // 유저 없음
            // 로그찍기
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');   
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // response Data
        $responseData= [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        Log::debug('End Login', $responseData);
        return response()->json($responseData, 200);
    }

    // 회원가입
    public function join(Request $request) {
        // (출력할 문자열 파라미터, 배열파라미터)
        Log::debug('Start Join', $request->all());


        $requestData = [
            'name' => $request->name
            ,'email' => $request->email
            ,'account' => $request->account
            ,'password' => $request->password
            ,'password_chk' => $request->password_chk
        ];

        //유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);
        
        //유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('Join Validation Error', $resultValidate->errors()->all());
           throw new MyValidateException('E01'); 
        }

        //유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                ->withCount('boards')
                                ->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            // 유저 없음
            // 로그찍기
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');   
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // response Data
        $responseData= [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        Log::debug('End Join', $responseData);
        return response()->json($responseData, 200);
    }

    // 이메일 중복체크
    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }
    /**
     * 로그아웃
     * 
     * @param use Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function logout(Request $request) {
        $id = MyToken::getValueInPayLoad($request->bearerToken(), 'idt');
        // 해당 id의 유저정보를 가져오는 부분
        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $userInfo
        ];
        return response()->json($responseData, 200);
    }

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function reissue(Request $request) {
        Log::debug('***************** 토큰 재발급 시작 *********************');
        // 유저 PK 획득
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        Log::debug('bearer 토큰: '.$request->bearerToken());
        Log::debug('유저 PK : '.$id);
        
        // 유저 정보 획득
        $resultUserInfo = User::find($id);
        Log::debug('유저 정보: ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }
        Log::debug('유효한 유저 확인 완료');

        // 리프래시 토큰 체크
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23');
        }
        Log::debug('리프래시 토큰 체크 완료');

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');

        // response Data
        $responseData= [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        Log::debug('End Login', $responseData);
        return response()->json($responseData, 200);
        Log::debug('***************** 토큰 재발급 완료 *********************');

    }
}