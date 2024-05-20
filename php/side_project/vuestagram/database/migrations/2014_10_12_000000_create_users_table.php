<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('account', 20)->unique();
            $table->string('password');
            $table->char('gender', 1)->coment('0: 남자, 1: 여자');
            $table->string('profile', 100)->nullable();
            // null이면 로그인을 하지 않은 유저인거임
            $table->string('refresh_token', 512)->nullable();
            $table->timestampts();
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