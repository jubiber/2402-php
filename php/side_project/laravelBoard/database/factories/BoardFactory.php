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

        ];
        return [
            'user_id'   => User::inRandomOrder()->first()->id
            ,'type'     => BoardName::inRandomOrder()->first()->type
            ,'title'    => $this->faker->realText(50)
            ,'content'  => $this->faker->realText(1000)
            ,'img'      => Arr::random($arrImg)
        ];
    }
}
