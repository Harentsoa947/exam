<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function prof()
    {
        return view('prof/prof');
    }

    public function creation_sujet()
    {
        return view('prof/creation_sujet');
    }
    public function sujet_qcm()
    {
        return view('prof/sujet_qcm');
    }
    public function relier_fleche()
    {
        return view('prof/relier_fleche');
    }

    public function mots_croises()
    {
        return view('prof/mots_croises');
    }
}
