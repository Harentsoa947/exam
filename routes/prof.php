<?php

use App\Http\Controllers\Prof\ProfDashboardController;
use App\Http\Controllers\Prof\ProfExamenController;
use App\Http\Controllers\Prof\ProfExamenWebCodeController;
use App\Http\Controllers\Prof\ProfExamenWebCodeQuestionController;
use App\Http\Controllers\Prof\ProfExamenWebController;
use App\Http\Controllers\Prof\ProfExamenWebCroiserController;
use App\Http\Controllers\Prof\ProfExamenWebDownloadController;
use App\Http\Controllers\Prof\ProfExamenWebDownloadQuestionController;
use App\Http\Controllers\Prof\ProfExamenWebFlecheController;
use App\Http\Controllers\Prof\ProfExamenWebFlecheQuestionController;
use App\Http\Controllers\Prof\ProfExamenWebPointillerController;
use App\Http\Controllers\Prof\ProfExamenWebPointillerQuestionController;
use App\Http\Controllers\Prof\ProfExamenWebQcmController;
use App\Http\Controllers\Prof\ProfExamenWebQcmQuestionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/prof', [ProfDashboardController::class, 'index'])->name('prof.dashboard');

    Route::controller(ProfExamenController::class)->group( function(){
        Route::get('prof/examen/{examen}/assign-types', 'assignTypes')->name('prof.examen.assignTypes');
        Route::post('prof/examen/{examen}/assign-types', 'storeTypes')->name('prof.examen.storeTypes');
    });

    Route::controller(ProfExamenWebController::class)->group(function(){
        // Route::get('/prof/examen-web', 'index')->name('prof.examen.web');
        Route::get('/prof/examen-web/{examen}/show', 'show')->name('prof.examen-web.show');
    });

    Route::controller(ProfExamenWebQcmController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/qcm', 'index')->name('prof.examen.web.qcm');
        Route::get('prof/examen-web/{examen}/qcm/create', 'create')->name('prof.examen.web.qcm.create');
        Route::post('prof/examen-web/{examen}/qcm/store', 'store')->name('prof.examen.web.qcm.store');
        Route::delete('prof/examen-web/{examen}/qcm/{qcmWeb}', 'destroy')->name('prof.examen.web.qcm.destroy');
    });

    Route::controller(ProfExamenWebQcmQuestionController::class)->group(function () {
        Route::get('prof/examen-web/{examen}/qcm/{qcmWeb}/question', 'index')->name('prof.examen.web.qcm.question.index');
        Route::get('prof/examen-web/{examen}/qcm/{qcmWeb}/question/create', 'create')->name('prof.examen.web.qcm.question.create');
        Route::post('prof/examen-web/{examen}/qcm/{qcmWeb}/question/store', 'store')->name('prof.examen.web.qcm.question.store');

    });

    Route::controller(ProfExamenWebPointillerController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/pointiller', 'index')->name('prof.examen.web.pointiller');
        Route::get('prof/examen-web/{examen}/pointiller/create', 'create')->name('prof.examen.web.pointiller.create');
        Route::post('prof/examen-web/{examen}/pointiller/store', 'store')->name('prof.examen.web.pointiller.store');
        Route::delete('prof/examen-web/{examen}/pointiller/{pointillerWeb}', 'destroy')->name('prof.examen.web.pointiller.destroy');
    });

    Route::controller(ProfExamenWebPointillerQuestionController::class)->group(function () {
        Route::get('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question', 'index')->name('prof.examen.web.pointiller.question.index');
        Route::get('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question/create', 'create')->name('prof.examen.web.pointiller.question.create');
        Route::post('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question/store', 'store')->name('prof.examen.web.pointiller.question.store');
        Route::get('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question/{question}/edit', 'edit')->name('prof.examen.web.pointiller.question.edit');
        Route::put('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question/{question}', 'update')->name('prof.examen.web.pointiller.question.update');
        Route::delete('prof/examen-web/{examen}/pointiller/{pointillerWeb}/question/{question}', 'destroy')->name('prof.examen.web.pointiller.question.destroy');
    });

    Route::controller(ProfExamenWebFlecheController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/fleche', 'index')->name('prof.examen.web.fleche');
        Route::get('prof/examen-web/{examen}/fleche/create', 'create')->name('prof.examen.web.fleche.create');
        Route::post('prof/examen-web/{examen}/fleche/store', 'store')->name('prof.examen.web.fleche.store');
        Route::delete('prof/examen-web/{examen}/fleche/{relierWeb}', 'destroy')->name('prof.examen.web.fleche.destroy');
    });

    Route::controller(ProfExamenWebFlecheQuestionController::class)->group(function () {
        Route::get('prof/examen-web/{examen}/fleche/{relierWeb}/question', 'index')->name('prof.examen.web.fleche.question.index');
        Route::get('prof/examen-web/{examen}/fleche/{relierWeb}/question/create', 'create')->name('prof.examen.web.fleche.question.create');
        Route::post('prof/examen-web/{examen}/fleche/{relierWeb}/question/store', 'store')->name('prof.examen.web.fleche.question.store');
        Route::get('prof/examen-web/{examen}/fleche/{relierWeb}/question/{question}/edit', 'edit')->name('prof.examen.web.fleche.question.edit');
        Route::put('prof/examen-web/{examen}/fleche/{relierWeb}/question/{question}', 'update')->name('prof.examen.web.fleche.question.update');
        Route::delete('prof/examen-web/{examen}/fleche/{relierWeb}/question/{question}', 'destroy')->name('prof.examen.web.fleche.question.destroy');
    });

    Route::controller(ProfExamenWebCroiserController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/croiser', 'index')->name('prof.examen.web.croiser');
        Route::get('prof/examen-web/{examen}/croiser/create', 'create')->name('prof.examen.web.croiser.create');
        Route::post('prof/examen-web/{examen}/croiser/store', 'store')->name('prof.examen.web.croiser.store');
        Route::delete('prof/examen-web/{examen}/croiser/{pointillerWeb}', 'destroy')->name('prof.examen.web.croiser.destroy');
    });

    Route::controller(ProfExamenWebDownloadController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/download-upload', 'index')
        ->name('prof.examen.web.download-upload');
        Route::get('prof/examen-web/{examen}/download-upload/create', 'create')
        ->name('prof.examen.web.download-upload.create');
        Route::post('prof/examen-web/{examen}/download-upload/store', 'store')
        ->name('prof.examen.web.download-upload.store');
        Route::delete('prof/examen-web/{examen}/download-upload/{fichierWeb}', 'destroy')
        ->name('prof.examen.web.download-upload.destroy');
    });

    Route::controller(ProfExamenWebDownloadQuestionController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/download-upload/{fichierWeb}/question', 'index')
            ->name('prof.examen.web.download-upload.qeustion.index');
        Route::get('prof/examen-web/{examen}/download-upload/{fichierWeb}/question/create', 'create')
            ->name('prof.examen.web.download-upload.qeustion.create');
        Route::post('prof/examen-web/{examen}/download-upload/{fichierWeb}/question/store', 'store')
            ->name('prof.examen.web.download-upload.qeustion.store');
        Route::get('prof/examen-web/{examen}/download-upload/{fichierWeb}/question/{question}/edit', 'edit')
            ->name('prof.examen.web.download-upload.qeustion.edit');
        Route::put('prof/examen-web/{examen}/download-upload/{fichierWeb}/question/{question}', 'update')
            ->name('prof.examen.web.download-upload.qeustion.update');
        Route::delete('prof/examen-web/{examen}/download-upload/{fichierWeb}/question/{question}', 'destroy')
            ->name('prof.examen.web.download-upload.qeustion.destroy');
    });

    Route::controller(ProfExamenWebCodeController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/code', 'index')
            ->name('prof.examen.web.code');
        Route::get('prof/examen-web/{examen}/code/create', 'create')
            ->name('prof.examen.web.code.create');
        Route::post('prof/examen-web/{examen}/code/store', 'store')
            ->name('prof.examen.web.code.store');
        Route::delete('prof/examen-web/{examen}/code/{codeWeb}', 'destroy')
            ->name('prof.examen.web.code.destroy');
    });

    Route::controller(ProfExamenWebCodeQuestionController::class)->group(function(){
        Route::get('prof/examen-web/{examen}/code/{codeWeb}/question', 'index')
            ->name('prof.examen.web.code.question.index');
        Route::get('prof/examen-web/{examen}/code/{codeWeb}/question/create', 'create')
            ->name('prof.examen.web.code.question.create');
        Route::post('prof/examen-web/{examen}/code/{codeWeb}/question/store', 'store')
            ->name('prof.examen.web.code.question.store');
        Route::get('prof/examen-web/{examen}/code/{codeWeb}/question/{question}/edit', 'edit')
            ->name('prof.examen.web.code.question.edit');
        Route::put('prof/examen-web/{examen}/code/{codeWeb}/question/{question}', 'update')
            ->name('prof.examen.web.code.question.update');
        Route::delete('prof/examen-web/{examen}/code/{codeWeb}/question/{question}', 'destroy')
            ->name('prof.examen.web.code.question.destroy');
    });
});