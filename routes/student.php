<?php

use App\Http\Controllers\Student\studentHomeCotroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [studentHomeCotroller::class, 'index'])
    ->name('home')
    ->middleware('auth');