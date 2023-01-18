<?php

use Illuminate\Support\Facades\Route;
use App\Http\COntrollers\taskcontroller;
use App\Http\COntrollers\RegisteredUserController;
use App\Http\COntrollers\AuthenticatedSessionController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
