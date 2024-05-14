<?php

namespace Database\Factories;

use App\Models\BoardName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrImg = [
            '/img/cat1.jpg'
            ,'/img/cat2.jpg'
            ,'/img/cat3.jpg'
            ,'/img/cat4.jpg'
            ,'/img/cat5.jpg'
            ,'/img/img.jpg'
            ,'/img/kuromi.jpg'
            ,'/img/mymel.jpg'
            ,'/img/rabit.jpg'
            ,'/img/rabit2.jpg'

        ];
        return [
            // 'user_id' 키에 사용자가 ID를 랜덤하게 선택하여 할당합니다.
            'user_id'   => User::inRandomOrder()->first()->id
            // 'type' 키에 랜덤한 게시판 유형을 선택하여 할당합니다.
            ,'type'     => BoardName::inRandomOrder()->first()->type
            // 'title' 키에 50자의 랜덤한 실제 텍스트를 생성하여 할당합니다.
            ,'title'    => $this->faker->realText(50)
            // 'content' 키에 1000자의 랜덤한 실제 텍스트를 생성하여 할당합니다.
            ,'content'  => $this->faker->realText(1000)
            // 'img' 키에 이미지 배열에서 랜덤하게 선택된 이미지를 할당합니다.
            ,'img'      => Arr::random($arrImg)
        ];
    }
}
