<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // select * from users where id in (?, ?); [2, 5]
        $result = DB::table('users')
                    ->whereBetween('id', [2, 5])
                    ->get();

        // select * from users where deleted_at is null;;
        $result = DB::table('users')
                    ->whereNull('deleted_at')
                    ->get();

        // 2023년에 가입한 사람만 출력
        // select * from users where year(created_at) = ?
        // select * from users created_at beetween 20230101000000 and 202312312359
        $result = DB::table('users')
                    ->whereYear('created_at', '2023')
                    ->get();

        // 남자 회원의 수를 구하자
        $result = DB::table('users')
                    ->where('gender','M')
                    ->get();
        // 성별 회원수
        // SELECT gender, COUNT(gender) FROM users GROUP BY gender;
        $result = DB::table('users')
                    ->select('gender', DB::raw('COUNT(gender) cnt'))
                    ->groupBy('gender')
                    ->having('gender', '=', 'M')
                    ->get();

        // select id, name from users order by id limit? offset ?; [1, 2];
        $result = DB::table('users')
                    ->select('id', 'name')
                    ->orderBy('id')
                    ->limit(1)
                    ->offset(2)
                    ->get();
        $reqData = ''; // 유저가 1또는 2인 데이터 전달
        $result = DB::table('users')
                    ->when($reqData, function($query, $reqData) {
                        $query->where('id', $reqData);
                    })
                    ->get();

        // first() : 쿼리 결과에서 가장 첫번째 레코드만 반환 
        $result = DB::table('users')->first();
        // count() : 쿼리 결과의 레코드 수를 반환        
        $result = DB::table('users')->count();
        // find($id) : 지정된 기본키의 해당하는 레코드를 반환
        // $result = DB::table('users')->fine(6);

        // insert
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@damin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'

        // ]);

        // update
        $result = DB::table('users')
                    ->where('id', 11)
                    ->update([
                        'email' => 'kim@naver.com'
                    ]);

        // delete
        // $result = DB::table('users')
        //             ->where('id', 11)
        //             ->delete();

        // ---------------
        // Eloquent Model
        // ---------------
        // $result = User::all();
        // $result = User::find(6);

        // upsert
        $data = [
            'name'       => '김영희'
            ,'email'     => 'kim@naver.com'
            ,'password'  => Hash::make('qwer1234!')
            ,'gender'    => 'F'
        ];
        // $result = User::create($data);
        

        // update (최신 정보 추가)
        // transaction (한꺼번에 수행되어야 할 일련의 연산모음)
        // DB::beginTransaction();
        // $target = User::find(14);
        // $target->gender = 'M';
        // save -> true false 뜸
        // $result = $target->save();
        // DB::commit();

        // delete
        // $result = User::destroy(14);

        // 소프트 딜리트 된 데이터 조회
        $result = User::withTrashed()->get(); // 소프트 딜리트 포함
        $result = User::onlyTrashed()->get(); // 소프트 딜리트만

        // 소프트 딜리트 된거 복원
        $result = User::where('id', 10)->restore();   
        
        return var_dump($result);
    }
}
