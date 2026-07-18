<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\CodeWeb;
use App\Models\Examen;
use Illuminate\Http\Request;

class ProfExamenWebCodeController extends Controller
{
    public function index(Examen $examen)
    {
        $codeWebs = $examen->codeWebs()->withCount('codeWebQuestions')->latest()->get();

        return view('prof.webb.code.index', compact('examen', 'codeWebs'));
    }

    public function create(Examen $examen)
    {
        return view('prof.webb.code.create', compact('examen'));
    }

    public function store(Request $request, Examen $examen)
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'note_totale' => ['nullable', 'integer', 'min:1'],
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'note_totale.integer' => 'La note totale doit être un nombre entier.',
        ]);

        $codeWeb = CodeWeb::create([
            'examen_id' => $examen->id,
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? null,
            'note_totale' => $validated['note_totale'] ?? null,
        ]);

        return redirect()
            ->route('prof.examen.web.code', [$examen->id, $codeWeb->id])
            ->with('success', 'Exercice code créé avec succès. Vous pouvez maintenant ajouter des questions.');
    }


    public function destroy(Examen $examen, CodeWeb $codeWeb)
    {
       
        $codeWeb->delete();

        return redirect()->back()
            ->with('success', 'Exercice  code supprimé avec succès.');
    }
}
