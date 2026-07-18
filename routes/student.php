<?php

use App\Http\Controllers\Student\StudentExamenController;
use App\Http\Controllers\Student\StudentExamenNavigationController;
use App\Http\Controllers\Student\StudentExamenWebQcmController;
use App\Http\Controllers\Student\studentHomeCotroller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [studentHomeCotroller::class, 'index'])
        ->name('home')
        ->middleware('auth');

    Route::controller(StudentExamenController::class)->group(function(){
        Route::get('/examen/{slug}', 'index')->name('student.examen.show');
        Route::post('/examen/{examen}/start', 'start')->name('student.examen.start');
    });
});

Route::middleware(['auth', 'examen.encours'])->controller(StudentExamenNavigationController::class)->group(function () {
    Route::get('/examen/{examen}/premiere-exercice', 'redirectToFirstExercice')->name('student.examen.first');
    Route::get('/examen/{examen}/next/{currentType}', 'next')->name('student.examen.next');

    Route::get('/examen/{examen}/qcm/{qcmWeb}', [StudentExamenWebQcmController::class, 'show'])->name('student.examen.qcm');
    // Route::get('/examen/{examen}/pointiller/{pointillerWeb}', [StudentPointillerController::class, 'show'])->name('student.examen.pointiller');
    // Route::get('/examen/{examen}/relier/{relierWeb}', [StudentRelierController::class, 'show'])->name('student.examen.relier');
    // Route::get('/examen/{examen}/code/{codeWeb}', [StudentCodeController::class, 'show'])->name('student.examen.code');
});