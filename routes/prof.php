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

    // post
    Route::post('prof/choix_sujet/qcm/post', 'post_qcm')->name('post_qcm');
    Route::post('prof/choix_sujet/relier_fleche/post', 'post_relier_fleche')->name('post.relier_fleche');
    Route::post('prof/choix_sujet/mots_croises/post', 'post_mots_croises')->name('post.mots_croises');
    Route::post('prof/choix_sujet/comprehension/post', 'comprehension_post')->name('post.comprehension_post');
    Route::post('prof/choix_sujet/pendule/post', 'pendule_post')->name('post.pendule');
    Route::post('prof/choix_sujet/redaction/post', 'redaction_post')->name('post.redaction');


    // Vue global des sujets
    Route::get('prof/choix_sujet/qcm/vue', 'vue_qcm')->name('prof.choix_sujet.qcm.vue');
    Route::get('prof/choix_sujet/relier_fleche/vue', 'vue_relier_fleche')->name('prof.choix_sujet.relier_fleche.vue');
});