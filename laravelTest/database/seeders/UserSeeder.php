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
            ['name' => '크롱1', 'email => crong@crong.com', 'password' => Hash::make('crong!')],
            ['name' => '루피2', 'email => ruppi@ruppi.com', 'password' => Hash::make('ruppi!')],
        ]);

        User::factory(10)->create(); // Factory 호출
    }
}
