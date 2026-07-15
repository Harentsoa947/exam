<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function prof(Request $req)
    {
        if(!$req->session()->has('proffesseur')){
            return view('/auth/login');
        }
        // dd(session('proffesseur')['id']);
        // dd(session('proffesseur'));
        $prof_id = session('proffesseur')['id'];
        $prof_category = session('proffesseur')['category_id'];
        $examen = DB::table('examen')
            ->where('prof_id', $prof_id)
            ->where('category_id', $prof_category)
            ->get();
        // dd($examen);
        return view('prof/prof', compact('examen'));
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
    public function pendule()
    {
        return view('prof/pendule');
    }
    public function redaction()
    {
        return view('prof/redaction');
    }
    public function comprehension()
    {
        return view('prof/comprehension');
    }

    public function info_examen()
    {
        return view('prof/info_examen');
    }
}
