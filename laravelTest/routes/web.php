<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\PostController;
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

// 로그인
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
// 로그아웃
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 회원가입 - agree
Route::get('/register_agree', [UserController::class, 'showRegisterationForm-1'])->name('register_agree.get');
Route::post('/register_agree', [UserController::class, 'register_agree'])->name('register_agree.post');
// 회원가입 - 개인정보 입력
Route::get('/register', [UserController::class, 'showRegisterationForm'])->name('register.get');
Route::post('/register', [UserController::class, 'register'])->name('register.post');

Route::get('/header', [UserController::class, 'header'])->name('header');

Route::get('/board', [BoardController::class, 'board'])->name('board');
Route::post('/board', [BoardController::class, 'store'])->name('board.store');

Route::get('/write', [BoardController::class, 'write'])->name('write');
// 블레이드 템플릿
// Route::get('/', function () {
//     return view('Login.Login')->with('name', '홍길동');
// })


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/create', [PostController::class, 'create'])->name('posts.create');


Route::get('/board', [BoardController::class, 'index'])->name('board');
Route::post('/board', [BoardController::class, 'store'])->name('posts.store');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');





