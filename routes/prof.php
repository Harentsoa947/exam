<?php

use App\Http\Controllers\Prof\ProfController;
use Illuminate\Support\Facades\Route;

Route::get('prof/', [ProfController::class, 'prof'])->name('prof');
Route::get('prof/choix_sujet', [ProfController::class, 'creation_sujet'])->name('prof.choix_sujet');
Route::get('prof/choix_sujet/qcm', [ProfController::class, 'sujet_qcm'])->name('prof.choix_sujet.qcm');
Route::get('prof/choix_sujet/relier_fleche', [ProfController::class, 'relier_fleche'])->name('prof.choix_sujet.relier_fleche');
Route::get('prof/choix_sujet/mots_croises', [ProfController::class, 'mots_croises'])->name('prof.chois_sujet.mots_croises');