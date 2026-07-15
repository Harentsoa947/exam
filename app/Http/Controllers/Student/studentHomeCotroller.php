<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentHomeCotroller extends Controller
{
    public function index(Request $req)
    {
        // temporaire stocker session prof
        $prof = DB::table('utilisateurs')->where('id', 2)->first();
        // dd($prof);
        session(['proffesseur' => $prof]);
        // dd(session('proffesseur'));

        // $req->session()->flush();


        return view('student/home');
    }
}
