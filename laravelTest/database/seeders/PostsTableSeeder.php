<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => '첫 번째 게시글',
                'content' => '이것은 첫 번째 게시글의 내용입니다.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '두 번째 게시글',
                'content' => '이것은 두 번째 게시글의 내용입니다.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 필요한 만큼 예제 데이터 추가
        ]);
    }
}
