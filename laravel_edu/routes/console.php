<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
// Artisan 명령어 'inspire'를 정의합니다. Artisan은 라라벨의 명령줄 인터페이스입니다.
Artisan::command('inspire', function () {
    // 이 명령어가 실행되면, 감동적인 명언을 포함한 주석을 출력합니다.
    $this->comment(Inspiring::quote());
    // 이 명령어의 목적을 설정합니다. 이는 사용 가능한 명령어를 나열할 떄 표시됩니다.
})->purpose('Display an inspiring quote');
