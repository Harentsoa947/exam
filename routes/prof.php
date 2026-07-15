<?php

use App\Http\Controllers\Prof\ProfController;
use Illuminate\Support\Facades\Route;

Route::controller(ProfController::class)->group(function(){
    Route::get('prof/', 'prof')->name('prof');
    Route::get('prof/choix_sujet', 'creation_sujet')->name('prof.choix_sujet');
    Route::get('prof/choix_sujet/qcm', 'sujet_qcm')->name('prof.choix_sujet.qcm');
    Route::get('prof/choix_sujet/relier_fleche', 'relier_fleche')->name('prof.choix_sujet.relier_fleche');
    Route::get('prof/choix_sujet/mots_croises', 'mots_croises')->name('prof.choix_sujet.mots_croises');
    Route::get('prof/choix_sujet/pendule', 'pendule')->name('prof.choix_sujet.pendule');
    Route::get('prof/choix_sujet/redaction', 'redaction')->name('prof.choix_sujet.redaction');
    Route::get('prof/choix_sujet/comprehension', 'comprehension')->name('prof.choix_sujet.comprehension');

    Route::get('prof/info_examen', 'info_examen')->name('prof.info_examen');
});