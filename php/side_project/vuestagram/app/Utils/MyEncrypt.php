<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Str;

class MyEncrypt {
    /**
     * base64 URL 인코드
     * 
     * @param   string $json
     * @return  string base64 URL encode
     */
    public function base64UrlEncode(string $json) {
        
        // strtr -> +는 -로 바뀌고 /는 _로 바뀜 (치환)
        // ==qw+qw/qw 이게 ststr을 거치면
        // ==qw-qw_qw 이렇게 바뀜. 추가설명 이해 몬함
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');  
    }

    /**
     * base64 URL 디코드
     * 
     * @param string base64 URL encode
     * @return string $json
     */
    public function base64UrlDecode(string $base64) {
        return base64_decode(strtr($base64, '-_','+/'));
    }

    /**
     * 암호화한 문자열 생성
    *
    *@param string $alg 알고리즘명
    *@param string $str 암호화 할 문자열
    *@param int $salt 솔트
    *@return string 암호화 된 문자열
    */
    public function hashWithSalt(string $alg,string $str,string $salt = '') {
        // 해시 알고리즘(alg)을 사용하여 문자열(str)의 해시 값을 계산하고,
        // 이를 솔트(salt)와 결합하여 새로운 솔트를 생성
        $salt = hash($alg, $str).$salt;
         // 해시 알고리즘(alg)을 사용하여 문자열(str)의 해시 값을 계산하고,
         // 새로 생성된 솔트와 결합하여 반환
        return hash($alg, $str).$salt;
    }

    /**
     * 특정 길이 만큼의 랜덤한 문자열 생성
     * 
     * @param int $saltLength
     * @param string 랜덤문자열
     */
    public function makeSalt($saltLength) {
        return Str::random($saltLength);
    }

    /**
     * 특정 길이의 솔트를 제거한 문자열 반환
     * 
     * @param string $signature 시그니처
     * @param int $saltLength 솔트 길이
     * 
     * @return string 솔트 제거한 문자열
     */
    public function subSalt(string $signature, int $saltLength) {
        return mb_substr($signature, 0, (-1 * $saltLength));
    }
}