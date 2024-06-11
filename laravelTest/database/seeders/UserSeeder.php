<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => '관리자1', 'email' => 'admin1@admin.com', 'password' => Hash::make('qwer1234!')],
            ['name' => '관리자2', 'email' => 'admin2@admin.com', 'password' => Hash::make('qwer1234!')],
            ['name' => '관리자3', 'email' => 'admin3@admin3.com', 'password' => Hash::make('qwer1234!')],
            ['name' => 'gromit', 'email' => 'gromit@gromit.com', 'password' => Hash::make('gromit')],
            ['name' => 'cobby', 'email' => 'cobby@cobby.com', 'password' => Hash::make('cobby')],
        ]);

        User::factory(10)->create(); // Factory 호출
    }
}
