<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEtudiantController extends Controller
{
    public function etudiant()
    {
        return view('admin/etudiant/etudiant');
    }
    public function ajout_etudiant()
    {
        return view('admin/etudiant/ajout');
    }
}
