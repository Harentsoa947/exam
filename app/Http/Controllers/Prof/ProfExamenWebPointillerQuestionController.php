<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\PointillerWeb;
use App\Models\PointillerWebQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfExamenWebPointillerQuestionController extends Controller
{
    public function index(Examen $examen, PointillerWeb $pointillerWeb)
    {
        $questions = $pointillerWeb->pointillerWebQuestions()
            ->with('reponses.choices')
            ->orderBy('id', 'desc')
            ->get();
        return view('prof.webb.pointiller.question&reponse.index', compact('examen','pointillerWeb','questions'));
    }

    public function create(Examen $examen, PointillerWeb $pointillerWeb)
    {
        return view('prof.webb.pointiller.question&reponse.create', compact('examen','pointillerWeb'));
    }

    public function store(Request $request, Examen $examen, PointillerWeb $pointillerWeb)
    {
        $validated = $request->validate([
            'enonce' => [
                'required',
                'string',
                Rule::unique('pointiller_web_questions', 'enonce')
                    ->where('pointiller_web_id', $pointillerWeb->id),
            ],
            'points' => ['required', 'numeric', 'min:0.1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'video' => ['nullable', 'file', 'mimes:mp4,mov,avi,webm', 'max:20480'],
            'trous' => ['required', 'array', 'min:1'],
            'trous.*.reponse_correcte' => ['required', 'string'],
            'trous.*.choices' => ['required', 'array', 'min:2'],
            'trous.*.choices.*' => ['required', 'string'],
        ], [
            'enonce.required' => 'L\'énoncé est obligatoire.',
            'trous.required' => 'Ajoutez au moins un trou avec sa réponse.',
            'trous.*.reponse_correcte.required' => 'Indiquez la réponse correcte pour chaque trou.',
            'trous.*.choices.min' => 'Chaque trou doit avoir au moins 2 choix dans la banque.',
        ]);

        DB::transaction(function () use ($request, $validated, $pointillerWeb) {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/questions'), $imageName);
                $imagePath = $imageName;
            }

            $videoPath = null;
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $videoName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('videos/questions'), $videoName);
                $videoPath = $videoName;
            }

            $question = PointillerWebQuestion::create([
                'pointiller_web_id' => $pointillerWeb->id,
                'enonce' => $validated['enonce'],
                'image' => $imagePath,
                'video' => $videoPath,
                'points' => $validated['points'],
                'ordre' => $pointillerWeb->pointillerWebQuestions()->count(),
            ]);

            

            foreach ($validated['trous'] as $position => $trou) {
                $reponse = $question->reponses()->create([
                    'position' => $position + 1,
                    'reponse_correcte' => trim($trou['reponse_correcte']),
                ]);

                if (!in_array(trim($trou['reponse_correcte']), array_map('trim', $trou['choices']))) {
                    $trou['choices'][] = $trou['reponse_correcte'];
                }

                foreach ($trou['choices'] as $choiceText) {
                    if (empty(trim($choiceText))) continue;

                    $reponse->choices()->create([
                        'texte' => trim($choiceText),
                    ]);
                }
            }
        });

        return redirect()
        ->route('prof.examen.web.pointiller.question.index',[$examen->id, $pointillerWeb->id] )
        ->with('success', 'Question ajoutée avec succès.');
    }

    public function edit(Examen $examen, PointillerWeb $pointillerWeb, PointillerWebQuestion $question)
    {
        $question->load('reponses.choices');

        return view('prof.webb.pointiller.question&reponse.edit', compact('examen', 'pointillerWeb', 'question'));
    }

    public function update(Request $request, Examen $examen, PointillerWeb $pointillerWeb, PointillerWebQuestion $question)
    {
        $validated = $request->validate([
            'enonce' => [
                'required',
                'string',
                Rule::unique('pointiller_web_questions', 'enonce')
                    ->where('pointiller_web_id', $pointillerWeb->id)
                    ->ignore($question->id),
            ],
            'points' => ['required', 'numeric', 'min:0.1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'video' => ['nullable', 'file', 'mimes:mp4,mov,avi,webm', 'max:20480'],
            'trous' => ['required', 'array', 'min:1'],
            'trous.*.reponse_correcte' => ['required', 'string'],
            'trous.*.choices' => ['required', 'array', 'min:2'],
            'trous.*.choices.*' => ['required', 'string'],
        ], [
            'enonce.required' => 'L\'énoncé est obligatoire.',
            'trous.required' => 'Ajoutez au moins un trou avec sa réponse.',
            'trous.*.reponse_correcte.required' => 'Indiquez la réponse correcte pour chaque trou.',
            'trous.*.choices.min' => 'Chaque trou doit avoir au moins 2 choix dans la banque.',
        ]);

        DB::transaction(function () use ($request, $validated, $question) {
            $imagePath = $question->image;
            if ($request->hasFile('image')) {
                if ($question->image && file_exists(public_path('images/questions/' . $question->image))) {
                    unlink(public_path('images/questions/' . $question->image));
                }
                $file = $request->file('image');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/questions'), $imageName);
                $imagePath = $imageName;
            }

            $videoPath = $question->video;
            if ($request->hasFile('video')) {
                if ($question->video && file_exists(public_path('videos/questions/' . $question->video))) {
                    unlink(public_path('videos/questions/' . $question->video));
                }
                $file = $request->file('video');
                $videoName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('videos/questions'), $videoName);
                $videoPath = $videoName;
            }

            $question->update([
                'enonce' => $validated['enonce'],
                'image' => $imagePath,
                'video' => $videoPath,
                'points' => $validated['points'],
            ]);

            $question->reponses()->delete();

            foreach ($validated['trous'] as $position => $trou) {
                $reponse = $question->reponses()->create([
                    'position' => $position + 1,
                    'reponse_correcte' => trim($trou['reponse_correcte']),
                ]);

                foreach ($trou['choices'] as $choiceText) {
                    if (empty(trim($choiceText))) continue;

                    $reponse->choices()->create([
                        'texte' => trim($choiceText),
                    ]);
                }
            }
        });

        return redirect()
            ->route('prof.examen.web.pointiller.question.index', [$examen->id, $pointillerWeb->id])
            ->with('success', 'Question modifiée avec succès.');
    }

    public function destroy(Examen $examen, PointillerWeb $pointillerWeb, PointillerWebQuestion $question)
    {
        // Esory ny fichier image/video raha misy
        if ($question->image && file_exists(public_path('images/questions/' . $question->image))) {
            unlink(public_path('images/questions/' . $question->image));
        }

        if ($question->video && file_exists(public_path('videos/questions/' . $question->video))) {
            unlink(public_path('videos/questions/' . $question->video));
        }

        $question->delete();

        return redirect()
            ->route('prof.examen.web.pointiller.question.index', [$examen->id, $pointillerWeb->id])
            ->with('success', 'Question supprimée avec succès.');
    }
}
