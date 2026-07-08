<?php

use App\Http\Controllers\Admin\AdminDasboardController;
use App\Http\Controllers\Admin\AdminProfController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminDasboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/prof/index', [AdminProfController::class, 'index'])->name('admin.prof.index');
Route::get('/admin/prof/create', [AdminProfController::class, 'create'])->name('admin.prof.create');
Route::post('/admin/prof/store', [AdminProfController::class, 'store'])->name('admin.prof.store');