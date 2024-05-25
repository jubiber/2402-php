<?php

namespace App\Utils;

use App\Exceptions\MyAuthException;
use MyEncrypt;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
     * @param App\Models\User $userInfo
     * @param int $ttl(초 단위)
     * @param bool $accessFlg
     * @return string base64Payload
     */
    private function makePayload(User $userInfo, int $ttl, bool $accessFlg) {
        $now = time(); // 현재시간

        // 페이로드 기본 데이터 생성
        $payload = [
            'idt' => $userInfo->id,
            //토큰 발급 시간 저장
            'iat' => $now,
            // 토큰 만료 시간 저장 (현재시간 + 유효시간)
            'exp' => $now + $ttl,
            // 토큰의 유효기간 저장
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
    // makeSignature 함수 정의: 헤더와 페이로드를 인자로 받음
    private function makeSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(
            env('TOKEN_ALG')
            , $header. env('TOKEN_SECRET_KEY').$payload
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
        /**
         * 토큰의 구조별로 분리
         * 
         * @param string $token 베어러 토큰
         * 
         * @return array $header, $payload, $signature
         */
        private function explodeToken($token) {
            //explode하면 asdf.asdg.asdg이렇게 오면 [asdf,asdg,asdf] 이런식으로 분리됨
            $arrToken = explode('.', $token);

            //토큰 분리 오류 체크
            if(count($arrToken) !== 3) {
                throw new MyAuthException('E24');
            }

            return [$arrToken[0], $arrToken[1], $arrToken[2],];
        }

        /**
         * 페이로드에서 해당하는 키의 값을 반환
         * 
         * @param string $token 토큰
         * @param string $key 키
         * 
         * @return 페이로드에서 추출한 값
         */

         public function getValueInPayload($token, $key) {
            list($header, $payload, $signature) = $this->explodeToken($token);
            $decodedPayload = json_decode(MyEncrypt::base64UrlDecode($payload));

            // 페이로드에 해당 키의 데이터가 있는지 체크
            if(empty($decodedPayload) || !isset($decodedPayload->$key)) {
              throw new MyAuthException('E24');  
            }
            
            return $decodedPayload->$key;
         }
        /**
         * 토큰 유효성 검사
         * 
         * @param string|null $token 베어러 토큰
         * 
         * @return bool|Throwable true|Trowable
         */
        public function chkToken($token) {
            // 토큰 존재 유무
            if(empty($token)) {
                throw new MyAuthException('E22');
            }
            
            // 토큰 위조 검사
            list($header, $payload, $signature) = $this->explodeToken($token);
            if(MyEncrypt::subSalt($this->makeSignature($header, $payload), env('TOKEN_SALT_LENGTH'))
                !== MyEncrypt::subSalt($signature, env('TOKEN_SALT_LENGTH'))) {
                throw new MyAuthException('E23');
            }
    
            Log::debug($signature);
            Log::debug($this->makeSignature($header, $payload));

            // 유효시간 체크
            if($this->getValueInPayload($token, 'exp') < time()) {
                throw new MyAuthException('E26');
            }

            //문제 없으면 true 반환
            Log::debug('***********************chkToken() End ***************************');
            return true;
        }

    /**
     * DB에 저장된 리프래시 토큰 삭제
     * 
     * @param App\Http\Model\User $userInfo 대상유저 모델객체
     * 
     * @return bool|Throwable true|Throwable
     */
    public function removeRefreshToken($userInfo) {
        DB::beginTransaction();
        $userInfo->refresh_token = null;
        $userInfo->save();
        DB::commit();

        return true;
    }
}

