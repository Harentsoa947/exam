<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\FichierWeb;
use App\Models\FichierWebQuestion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfExamenWebDownloadQuestionController extends Controller
{
    public function index(Examen $examen, FichierWeb $fichierWeb)
    {
        $questions = $fichierWeb->fichierWebQuestions()
            ->orderBy('ordre')
            ->get();

        return view('prof.webb.download&upoload.question.index', compact('examen', 'fichierWeb', 'questions'));
    }

    public function create(Examen $examen, FichierWeb $fichierWeb)
    {
        return view('prof.webb.download&upoload.question.create', compact('examen', 'fichierWeb'));
    }

    public function store(Request $request, Examen $examen, FichierWeb $fichierWeb)
    {
        $validated = $request->validate([
            'instruction' => [
                'required',
                'string',
                Rule::unique('fichier_web_questions', 'instruction')
                    ->where('fichier_web_id', $fichierWeb->id),
            ],
            'points' => ['required', 'numeric', 'min:0.1'],
            'fichier_prof' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip,rar', 'max:20240'],
        ], [
            'instruction.required' => 'L\'instruction est obligatoire.',
            'instruction.unique' => 'Cette instruction existe déjà dans ce devoir.',
            'fichier_prof.mimes' => 'Le fichier doit être au format pdf, doc, docx, zip ou rar.',
            'fichier_prof.max' => 'Le fichier ne doit pas dépasser 10 Mo.',
        ]);

        $fichierPath = null;
        if ($request->hasFile('fichier_prof')) {
            $file = $request->file('fichier_prof');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('fichiers/prof'), $fileName);
            $fichierPath = $fileName;
        }

        FichierWebQuestion::create([
            'fichier_web_id' => $fichierWeb->id,
            'instruction' => $validated['instruction'],
            'fichier_prof' => $fichierPath,
            'points' => $validated['points'],
            'ordre' => $fichierWeb->fichierWebQuestions()->count(),
        ]);

        return redirect()
            ->route('prof.examen.web.downloadUpload.qeustion.index', [$examen->id, $fichierWeb->id])
            ->with('success', 'Devoir ajouté avec succès.');
    }

    public function edit(Examen $examen, FichierWeb $fichierWeb, FichierWebQuestion $question)
    {
        return view('prof.webb.download&upoload.question.edit', compact('examen', 'fichierWeb', 'question'));
    }

    public function update(Request $request, Examen $examen, FichierWeb $fichierWeb, FichierWebQuestion $question)
    {
        $validated = $request->validate([
            'instruction' => [
                'required',
                'string',
                Rule::unique('fichier_web_questions', 'instruction')
                    ->where('fichier_web_id', $fichierWeb->id)
                    ->ignore($question->id),
            ],
            'points' => ['required', 'numeric', 'min:0.1'],
            'fichier_prof' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip,rar', 'max:20240'],
        ], [
            'instruction.required' => 'L\'instruction est obligatoire.',
            'instruction.unique' => 'Cette instruction existe déjà dans ce devoir.',
            'fichier_prof.mimes' => 'Le fichier doit être au format pdf, doc, docx, zip ou rar.',
            'fichier_prof.max' => 'Le fichier ne doit pas dépasser 10 Mo.',
        ]);

        $fichierPath = $question->fichier_prof;
        if ($request->hasFile('fichier_prof')) {
            if ($question->fichier_prof && file_exists(public_path('fichiers/prof/' . $question->fichier_prof))) {
                unlink(public_path('fichiers/prof/' . $question->fichier_prof));
            }
            $file = $request->file('fichier_prof');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('fichiers/prof'), $fileName);
            $fichierPath = $fileName;
        }

        $question->update([
            'instruction' => $validated['instruction'],
            'fichier_prof' => $fichierPath,
            'points' => $validated['points'],
        ]);

        return redirect()
            ->route('prof.examen.web.downloadUpload.qeustion.index', [$examen->id, $fichierWeb->id])
            ->with('success', 'Devoir modifié avec succès.');
    }

    public function destroy(Examen $examen, FichierWeb $fichierWeb, FichierWebQuestion $question)
    {
        if ($question->fichier_prof && file_exists(public_path('fichiers/prof/' . $question->fichier_prof))) {
            unlink(public_path('fichiers/prof/' . $question->fichier_prof));
        }

        $question->delete();

        return redirect()
            ->back()
            ->with('success', 'Devoir supprimé avec succès.');
    }
}
