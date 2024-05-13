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

     //definition 메소드 정의
    public function definition()
    {
        // 배열을 반환
        return [
            // 'name' 키에 랜덤한 이름을 생성하여 할당함.
            'name' => $this->faker->name(),
             // 'email' 키에 고유한 안전한 이메일 주소를 생성하여 할당
            'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' 키에 시간을 할당.
            'email_verified_at' => now(),
            // 'password' 키에 해시된 비밀번호를 할당
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' 키에 길이가 10인 랜덤한 문자열을 할당합니다.
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
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
