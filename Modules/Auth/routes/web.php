<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\Web\frontend\LoginForm;
use Modules\Auth\App\Http\Controllers\Web\frontend\LoginPost;
use Modules\Auth\App\Http\Controllers\Web\frontend\Logout;
use Modules\Auth\App\Http\Controllers\Web\frontend\RegisterForm;
use Modules\Auth\App\Http\Controllers\Web\frontend\RegisterPost;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginForm::class, 'execute'])->name('login.form');
    Route::post('/login', [LoginPost::class, 'execute'])->name('login.post');
    Route::get('/register', [RegisterForm::class, 'execute'])->name('register.form');
    Route::post('/register', [RegisterPost::class, 'execute'])->name('register.post');
    Route::get('/logout', [Logout::class, 'execute'])->name('logout');
});
