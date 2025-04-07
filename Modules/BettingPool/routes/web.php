<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\BettingPool\App\Http\Controllers\Web\Frontend\CreateBettingPool;

Route::post('/createBettingPool', [CreateBettingPool::class, 'execute'])->name('new.betting.pool');
