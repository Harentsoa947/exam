<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\RelierWeb;
use Illuminate\Http\Request;

class ProfExamenWebFlecheController extends Controller
{
    public function index(Examen $examen)
    {
        $relierWebs = $examen->reilerWebs()->withCount('relierWebQuestions')->latest()->get();
        return view('prof.webb.fleche.index', compact('examen', 'relierWebs'));
    }

    public function create(Examen $examen)
    {
        return view('prof.webb.fleche.create', compact('examen'));
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

        $relierWeb = RelierWeb::create([
            'examen_id' => $examen->id,
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? null,
            'note_totale' => $validated['note_totale'] ?? null,
        ]);

        return redirect()
            ->route('prof.examen.web.fleche', [$examen->id, $relierWeb->id])
            ->with('success', 'Relier par flèce créé avec succès. Vous pouvez maintenant ajouter des questions.');
    }

    public function destroy(Examen $examen, RelierWeb $relierWeb)
    {
        foreach ($relierWeb->relierWebQuestions as $question) {
            if ($question->image && file_exists(public_path('images/questions/' . $question->image))) {
                unlink(public_path('images/questions/' . $question->image));
            }
            if ($question->video && file_exists(public_path('videos/questions/' . $question->video))) {
                unlink(public_path('videos/questions/' . $question->video));
            }
        }

        $relierWeb->delete();

        return redirect()->back()
            ->with('success', 'Exercice supprimé avec succès.');
    }
}
