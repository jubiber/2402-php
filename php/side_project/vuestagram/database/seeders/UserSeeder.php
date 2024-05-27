<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


// Database: Seeding이란? 
// DB에 초기 데이터 및 테스트용 더미 데이터를 삽입하는 과정
class Userseeder extends Seeder 
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        $data = [
            'account' => 'admin'
            ,'password' => Hash::make('gromit')
            ,'password_chk' => Hash::make('gromit')
            ,'name' => '그로밋'
            ,'gender' => '0'
            ,'profile' => '/profile/default.png'
        ];
        User::create($data);
    }
}
