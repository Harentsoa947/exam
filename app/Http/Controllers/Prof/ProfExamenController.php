<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\TypeExercice;
use Illuminate\Http\Request;

class ProfExamenController extends Controller
{
    public function assignTypes(Examen $examen)
    {
        $typesExercice = TypeExercice::all();

        return view('prof.examen.assign-types', compact('examen', 'typesExercice'));
    }

    public function storeTypes(Request $request, Examen $examen)
    {
        $validated = $request->validate([
            'type_exercice_id' => ['required', 'array', 'min:1'],
            'type_exercice_id.*' => ['exists:types_exercice,id'],
        ], [
            'type_exercice_id.required' => 'Veuillez sélectionner au moins un type d\'exercice.',
        ]);

        
        $examen->typesExercice()->sync($validated['type_exercice_id']);

        return redirect()
            ->back()
            ->with('success', 'Types d\'exercice ajoutés avec succès.');
    }
}
