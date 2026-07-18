<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Examen;
use Illuminate\Http\Request;

class AdminExamenWebController extends Controller
{
    public function index()
    {
        $categorie = Categorie::where('slug', 'web')->firstOrFail();

        $examens = Examen::where('categorie_id', $categorie->id)
            ->latest()
            ->paginate(10);

        return view('admin.examen.webb.index', compact('examens') );
    }

}
