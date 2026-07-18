<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;

class ProfExamenWebController extends Controller
{
    public function show(Examen $examen)
    {
        $examen->load('typesExercice');
        return view('prof.webb.webexamtype', compact('examen'));
    }
}
