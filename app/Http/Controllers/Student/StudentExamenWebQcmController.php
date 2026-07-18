<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\QcmWeb;
use Illuminate\Http\Request;

class StudentExamenWebQcmController extends Controller
{
    public function show(Examen $examen, QcmWeb $qcmWeb)
    {
        return view('student.examen.webb.qcm.show', compact('examen', 'qcmWeb'));
    }
}
