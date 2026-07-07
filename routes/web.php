<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\loginController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Scalar\MagicConst\Dir;




Route::get('/login', [loginController::class, 'login'])->name('login');


Route::get('/admin', [AdminController::class, 'accueil_admin'])->name('admin');
Route::get('/admin/parametre', [AdminController::class, 'parametre_admin'])->name('admin.param.admin');
Route::get('admin/parametre/apparence', [AdminController::class, 'parametre_admin_apparence'])->name('admin.param.admin.apparence');


require __DIR__.'/student.php';