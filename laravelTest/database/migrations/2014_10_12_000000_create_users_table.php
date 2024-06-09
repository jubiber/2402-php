<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_chk');
            $table->rememberToken();
            $table->timestamps(); // 기본 제공되는 timestamps 메서드를 사용합니다.
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}