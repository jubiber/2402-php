<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // run 메소드 -> Lravel의 시더 클래스에서 데이터를
    // 데이터베이스에 삽입하기 위해 사용되는 메소드임
    public function run()
    {
        // call 메소드 -> 다른 시더 클래스를 호출하여 실행함
       $this->call([
        UserSeeder::class,
       ]);
       // 이 코드는 'Board' 모델을 사용해서 50개의 가짜(faker) 데이터를
       // 생성하고 데이터베이스에 삽입합니다.
       // 'create()' 메소드는 생성된 인스턴스를 실제로 데이터베이스에 
       // 삽입합니다.
       Board::factory(50)->create();
    }
}
