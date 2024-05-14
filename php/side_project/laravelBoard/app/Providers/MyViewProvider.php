<?php

namespace App\Providers;

use App\Models\BoardName;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MyViewProvider extends ServiceProvider
{
    // 프로바이더 생성 명령어
    // php artisan make:provider 프로바이더명
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 모든 뷰에 게시판이름 테이블 정보를 전달하는 처리
        // * -> 모든 뷰를 의미
        View::composer('*', function($view) {
            // BoardName 모델에서 'type' 필드로 정렬된 모든 레코드를 가져옵니다.
            $result = BoardName::orderBy('type')->get();
            // 뷰에 'globalBoardNameInfo'라는 이름으로 데이터를 전달합니다.
            $view->with('globalBoardNameInfo', $result);
        });
    }
}
