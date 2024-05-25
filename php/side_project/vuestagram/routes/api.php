<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// /login 앞에 api: 생략임
Route::post('/login', [UserController::class, 'login']);
Route::middleware('my.auth')->post('/logout', [UserController::class, 'logout']);

// 보드 관련
Route::middleware('my.auth')->get('/board/{id}/list', [BoardController::class, 'index']);
Route::middleware('my.auth')->get('/board/{id}', [BoardController::class, 'addIndex']);
Route::middleware('my.auth')->post('/board', [BoardController::class, 'store']);
// 오케이
