<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;



Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register',[RegisteredUserController::class, 'store']);
Route::get('/login',[AuthenticatedSessionController::class, 'create']);
Route::post('/login',[AuthenticatedSessionController::class, 'store']);
Route::post('/logout',[AuthenticatedSessionController::class, 'destroy']);
Route::get('/',[TaskController::class, 'index']);
Route::post('/create',[TaskController::class, 'create']);
Route::post('/edit',[TaskController::class, 'edit']);
Route::post('/delete',[TaskController::class, 'delete']);
Route::get('/find',[TaskController::class, 'find']);
Route::get('/search',[TaskController::class, 'search']);

/*
breezeインストール直後は下記の内容しかない。
このルーティングでwelcome.blade.phpやdashboard.blade.phpを返している。


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

記述を下記の様に変更する事で初期画面をwelcomeからregisterに変え、ログイン後ミドルウェアを介してindexを返している

*/

Route::get('/', function () {
    return view('register');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';
