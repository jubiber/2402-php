<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // -----------
        // 쿼리 빌더
        // -----------
        // $result = DB::select('select * from users');
        // $result = DB::select(
        //     "SELECT * from users where name = ':name'"
        //     ,['name' => '갑돌이']
        // ); 
        // $result = DB::select(
        //     "SELECT * from users where name = ? or name = ?"
        //     ,['갑돌이', '갑순이']
        // );
        
        // $result = DB::select(
        //     'SELECT * from users WHERE deleted_at is not null');
            
        // insert
        // $sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";
        // $data = ['김철수', 'admin4@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랜잭션 시작
        // $result = DB::insert($sql, $data);
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // } else {
        //     DB::commit(); // 커밋
        // }

        // update
        // $sql = 'UPDATE users SET deleted_at = null where id = ?';
        // $data = [6];
        // $result = DB::update($sql, $data);

        // delete
        // $sql = 'DELETE FROM users where id = ?';
        // $data = [7];
        // $result = DB::delete($sql, $data);

        // -------------------
        // (알아두셈)쿼리 빌더 체이닝
        // -------------------
        // users 테이블 모든 데이터 조회
        // select * from users;
        // $result = DB::table('users')->get();
        // select * from users where name = ?; ['홍길동']
        // $result = DB::table('users')->where('name', '=', '홍길동')->get();

        // select * from users where id = ? or id = ?; [6, 7]
        // $result = DB::table('users')
        //             ->where('id', 6)
        //             ->orWhere('id', 7)
        //             ->get();

        // SELECT * from users where name = ? and id = ?; ['홍길동', 6]
        // $result = DB::table('users')
        //             ->where('name', '홍길동')
        //             ->where('id', 6)
        //             ->get();

        // select name from users order by name ASC;
        $result = DB::table('users')
                    ->select('name','email','created_at')
                    ->orderBy('name', 'ASC')
                    ->get();

        // WHERE (많)
        return var_dump($result);
    }
}
