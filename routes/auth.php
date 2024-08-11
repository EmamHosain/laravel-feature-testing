<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login-auth', [LoginController::class, 'loginAuth'])->name('login.auth');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');