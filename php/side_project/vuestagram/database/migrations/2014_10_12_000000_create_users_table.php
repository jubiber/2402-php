<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Migration 이란? 데이터베이스 변경사항 추적하고 적용하는거
return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */

    public function up()
    {
        // Migration 작성 : Schema 파사드에 create 메소드 사용.
        // create 메소드는 첫번째 아규먼트는 테이블명, 두번째 아규먼트는 Blueprint 객체를 받는
        // Closure를 전달
        Schema::create('users', function (Blueprint $table) {
            //$table -> 데이터베이스의 테이블을 나타내는 객체
            $table->id();
            $table->string('name', 20);
            $table->string('account', 20)->unique();
            $table->string('password');
            $table->string('password_chk');
            $table->char('gender', 1)->coment('0: 남자, 1: 여자');
            $table->string('profile', 100)->nullable();
            // null이면 로그인을 하지 않은 유저인거임
            $table->string('refresh_token', 512)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

};

