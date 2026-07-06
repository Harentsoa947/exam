<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'accueil_admin'])->name('admin');
Route::get('/admin/parametre', [AdminController::class, 'parametre_admin'])->name('admin.param.admin');
Route::get('admin/parametre/apparence', [AdminController::class, 'parametre_admin_apparence'])->name('admin.param.admin.apparence');
