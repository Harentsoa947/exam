<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function accueil_admin()
    {
        return view('admin/admin');
    }
    public function parametre_admin()
    {
        return view('admin/parametre/parametre');
    }
    public function parametre_admin_apparence()
    {
        return view('admin/parametre/apparence');
    }
}
