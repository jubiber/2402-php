<?php

namespace App\Utils;

use MyEncrypt;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MyToken {
    /**
     * 엑세스 토큰과 리프래시 토큰 생성
     * 
     * @param All\Model\User $userInfo
     * @return Array [$accessToken, $refreshToken]
     * 
     */
    //createTokens의 역할 -> 토큰 2개 생성해서 리턴하는 것.
    public function createTokens(User $userInfo) {
        $accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS'));
        //엑세스토큰 재발급하기 위한거고 엑세스토큰과
        //항상 같이 생성되어야함
        $refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }
    /**
     * JWT 생성
     * 
     * @param All\Model\User $userInfo
     * @param int $ttl
     * @param bool $accessFlg = true
     * @return string JWT
     */
    // createToken 역할 -> 3개 만들어서 리턴
    private function createToken(User $userInfo, int $ttl, bool $accessFlg = true) {
        $header = $this->makeHeader();
        $payload = $this->makePayload($userInfo, $ttl, $accessFlg);
        $signature= $this->makeSignature($header, $payload);
        //구조 (연결 후 리턴하면 끗!)
        return $header.".".$payload.".".$signature;
    }
    /**
     * JWT 헤더 작성
     * 
     * @return string base64Header
     */
    private function makeHeader() {
        $header = [
            'alg' => env('TOKEN_ALG')
            ,'typ' => env('TOKEN_TYPE')
        ];
//json_encode -> 제이슨 형태로 바꿔주는거임
        return MyEncrypt::base64UrlEncode(json_encode($header));
    }
       /**
     * JWT 페이로드 작성
     * 
     * @param App\Model\User $userInfo
     * @param int $ttl(초 단위)
     * @param bool $accessFlg
     * @return string base64Payload
     */
    private function makePayload(User $userInfo, int $ttl, bool $accessFlg) {
        $now = time(); // 현재시간

        // 페이로드 기본 데이터 생성
        $payload = [
            'idt' => $userInfo->id,
            'iat' => $now,
            'exp' => $now + $ttl,
            'ttl' => $ttl
       ];
       // 엑세스 토큰일 경우 아래 데이터 추가
       if($accessFlg) {
        $payload['acc'] = $userInfo->account;
        $payload['name'] = $userInfo->name;
       }
       return MyEncrypt::base64UrlEncode(json_encode($payload));
    }

    /**
     * JWT 시그니쳐 작성
     * 
     * @param string $header base64URL Encode 
     * @param string $payload base64URL Encode
     * @return string base64Signature
     */
    private function makeSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG')
        , $header.env('TOKEN_SECRET_KEY').$payload
        , MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH'))
    );
    }

    /**
     * 리프래시 토큰 저장
     * 
     * @param App\Model\User $userInfo 유저정보
     * @param string $refreshToken 리프래시 토큰
     * 
     * @return bool true
     */
    public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저 모델 객체에 리프래시 토큰 추가
        $userInfo->refresh_token = $refreshToken;

            // update 처리
            DB::beginTransaction();
        // !($userInfo->Save())부분에 false -> 에러나오는지
            if(!($userInfo->save())) {
                DB::rollBack();
                throw new PDOException();
            }
            DB::commit();

            return true;

        }
    }
