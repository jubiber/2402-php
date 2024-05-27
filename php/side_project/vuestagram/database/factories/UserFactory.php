<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' 키에 임의의 이름을 생성하여 할당합니다.
            'name' => $this->faker->name(),
            // 'email' 키에 중복되지 않는 안전한 이메일 주소를 생성하여 할당합니다.
            'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at'키에 현재 시간을 할당합니다.
            'email_verified_at' => now(),
            // 'password' 키에 암호화된 비밀번호를 할당합니다. (이 예시에서는 고정된 해시 값 사용)
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password_chk' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // 'remember_token' 키에 임의의 10자리 문자열을 생성하여 할당합니다.
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        // $attributes 배열을 인자로 받는 익명 함수를 정의하고, 이를 state 메서드에 전달합니다.
        return $this->state(function (array $attributes) {
            // 익명 함수는 배열을 반환합니다.
            return [
            // 'email_verified_at' 키의 값을 null로 설정합니다.
            // 해석 -> 이메일 확인 날짜를 비워두는 상태를 의미합니다.
                'email_verified_at' => null,
            ];
        });
    }
}
