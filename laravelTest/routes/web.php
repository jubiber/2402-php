<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// ---------------
// 라우터 정의
// ---------------
Route::get('/hi', function () {
    return '안녕하세요';
})->name('hi');

//로그인
Route::get('/Login', [UserController::class, 'Login'])->name('login');
Route::get('/join', [UserController::class, 'join'])->name('join');
Route::get('/header', [UserController::class, 'header'])->name('header');
Route::resource('/board', BoardController::class);

// 블레이드 템플릿
// Route::get('/', function () {
//     return view('Login.Login')->with('name', '홍길동');
// })



