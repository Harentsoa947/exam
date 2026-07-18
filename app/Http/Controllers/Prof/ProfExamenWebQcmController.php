<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\QcmWeb;
use Illuminate\Http\Request;

class ProfExamenWebQcmController extends Controller
{
    public function index(Examen $examen)
    {
        $qcmWebs = $examen->qcmWebs()->withCount('qcmWebQuestions')->latest()->get();
        return view('prof.webb.qcm.index', compact('examen', 'qcmWebs'));
    }

    public function create(Examen $examen)
    {
        return view('prof.webb.qcm.create', compact('examen'));
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

        $qcmWeb = QcmWeb::create([
            'examen_id' => $examen->id,
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? null,
            'duree_minutes' => $validated['duree_minutes'] ?? null,
            'note_totale' => $validated['note_totale'] ?? null,
        ]);

        return redirect()
            ->route('prof.examen.web.qcm', [$examen->id, $qcmWeb->id])
            ->with('success', 'QCM créé avec succès. Vous pouvez maintenant ajouter des questions.');
    }


    public function destroy(Examen $examen, QcmWeb $qcmWeb)
    {
        foreach ($qcmWeb->qcmWebQuestions as $question) {
            if ($question->image && file_exists(public_path('images/questions/' . $question->image))) {
                unlink(public_path('images/questions/' . $question->image));
            }
            if ($question->video && file_exists(public_path('videos/questions/' . $question->video))) {
                unlink(public_path('videos/questions/' . $question->video));
            }
        }

        $qcmWeb->delete();

        return redirect()->back()
            ->with('success', 'QCM supprimé avec succès.');
    }
}
