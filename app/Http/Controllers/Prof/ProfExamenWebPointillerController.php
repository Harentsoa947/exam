<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\PointillerWeb;
use Illuminate\Http\Request;

class ProfExamenWebPointillerController extends Controller
{
    public function index(Examen $examen)
    {
        $pointillerWebs = $examen->pointillerWebs()->withCount('pointillerWebQuestions')->latest()->get();
        return view('prof.webb.pointiller.index', compact('pointillerWebs','examen'));
    }

    public function create(Examen $examen)
    {
        return view('prof.webb.pointiller.create', compact('examen'));
    }

    public function store(Request $request, Examen $examen)
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'duree_minutes' => ['nullable', 'integer', 'min:1'],
            'note_totale' => ['nullable', 'integer', 'min:1'],
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'duree_minutes.integer' => 'La durée doit être un nombre entier.',
            'note_totale.integer' => 'La note totale doit être un nombre entier.',
        ]);

        $pointillerWeb = PointillerWeb::create([
            'examen_id' => $examen->id,
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? null,
            'duree_minutes' => $validated['duree_minutes'] ?? null,
            'note_totale' => $validated['note_totale'] ?? null,
        ]);

        return redirect()
            ->route('prof.examen.web.pointiller', [$examen->id, $pointillerWeb->id])
            ->with('success', 'QCM créé avec succès. Vous pouvez maintenant ajouter des questions.');
    }

    public function destroy(Examen $examen, PointillerWeb $pointillerWeb)
    {
        foreach ($pointillerWeb->pointillerWebQuestions as $question) {
            if ($question->image && file_exists(public_path('images/questions/' . $question->image))) {
                unlink(public_path('images/questions/' . $question->image));
            }
            if ($question->video && file_exists(public_path('videos/questions/' . $question->video))) {
                unlink(public_path('videos/questions/' . $question->video));
            }
        }

        $pointillerWeb->delete();

        return redirect()->back()
            ->with('success', 'QCM supprimé avec succès.');
    }
}
