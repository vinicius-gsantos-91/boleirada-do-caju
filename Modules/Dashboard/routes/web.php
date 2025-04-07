<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\App\Http\Controllers\Web\Frontend\Index;

Route::get('/dashboard', [Index::class, 'execute'])->name('dashboard.index');
