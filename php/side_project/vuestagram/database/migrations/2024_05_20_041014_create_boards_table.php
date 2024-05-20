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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            //unsigned -> 부등호 없애주는거임
            // user랑 fk로 엮을 부분
            $table->bigInteger('user_id')->unsigned();
            $table->string('content', 200);
            $table->string('img', 100);
            // 좋아요 숫자 올라가는거
            $table->integer('like')->default(0);
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
        Schema::dropIfExists('boards');
    }
};
