<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\BettingPool\App\Http\Controllers\Web\Frontend\CreateBettingPool;
use Modules\BettingPool\App\Http\Controllers\Web\Frontend\JoinBettingPool;
use Modules\BettingPool\App\Http\Controllers\Web\Frontend\View;

Route::prefix('bettingPool')->name('bettingPool.')->group(function () {
    Route::post('/create', [CreateBettingPool::class, 'execute'])->name('new.betting.pool');
    Route::post('/join', [JoinBettingPool::class, 'execute'])->name('join.betting.pool');
    Route::get('/view/{code}', [View::class, 'execute'])->name('view');
});
