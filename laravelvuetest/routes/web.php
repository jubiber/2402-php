<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//------------------------------ 주은혜 ----------------------------------
Route::get('/api/recommend/season', [RecommendController::class, 'getSeason']);

// HTTP Method(박병주강사님 질문)
// Route::get() post put patch delete options

// 문자열 리턴
Route::get('/hi', function () {
    return '안녕하세요.';
});

Route::get('/', function () {
    return view('layout.layout')->with('name', '홍길동');
});















// ------------------------------ 끝 -----------------------------------
