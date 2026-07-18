<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\QcmWeb;
use App\Models\QcmWebQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfExamenWebQcmQuestionController extends Controller
{
    public function index(Examen $examen, QcmWeb $qcmWeb)
    {
        $questions = $qcmWeb->qcmWebQuestions()->with('qcmWebChoices')->orderBy('id', 'desc')->get();
        return view('prof.webb.qcm.question&reponse.index', compact('examen','qcmWeb', 'questions'));
    }

    public function create(Examen $examen, QcmWeb $qcmWeb)
    { 
        return view('prof.webb.qcm.question&reponse.create', compact('examen','qcmWeb'));
    }

    public function store(Request $request, Examen $examen, QcmWeb $qcmWeb)
    {
        $validated = $request->validate([
            'questions' => ['required', 'array', 'min:1'],
            'questions.*.enonce' => ['required', 'string'],
            'questions.*.points' => ['required', 'numeric', 'min:0.1'],
            'questions.*.reponse_type' => ['required', 'in:true_false,single,multiple'],
            'questions.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'questions.*.video' => ['nullable', 'file', 'mimes:mp4,mov,avi,webm', 'max:20480'], // <-- ovaina
            'questions.*.choices' => ['nullable', 'array'],
            'questions.*.choices.*.texte' => ['nullable', 'string'],
            'questions.*.choices.*.est_correcte' => ['nullable'],
            'questions.*.vrai_faux_correct' => ['nullable', 'in:vrai,faux'],
        ], [
            'questions.required' => 'Ajoutez au moins une question.',
            'questions.*.enonce.required' => 'L\'énoncé de chaque question est obligatoire.',
            'questions.*.video.mimes' => 'La vidéo doit être au format mp4, mov, avi ou webm.',
            'questions.*.video.max' => 'La vidéo ne doit pas dépasser 20 Mo.',
        ]);

        // Fanamarinana manuel isaky ny question, araka ny reponse_type
        foreach ($validated['questions'] as $index => $q) {
            if ($q['reponse_type'] === 'true_false') {
                if (empty($q['vrai_faux_correct'])) {
                    return back()->withErrors(["questions.$index.vrai_faux_correct" => 'Choisissez la bonne réponse (Vrai ou Faux).'])->withInput();
                }
            } else {
                if (empty($q['choices']) || count(array_filter($q['choices'], fn($c) => !empty($c['texte']))) < 2) {
                    return back()->withErrors(["questions.$index.choices" => 'Ajoutez au moins 2 choix valides.'])->withInput();
                }
            }
        }

        DB::transaction(function () use ($request, $validated, $qcmWeb) {
            foreach ($validated['questions'] as $index => $questionData) {
                $imagePath = null;
                if ($request->hasFile("questions.$index.image")) {
                    $file = $request->file("questions.$index.image");
                    $imageName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/questions'), $imageName);
                    $imagePath = $imageName;
                }

                // <-- AMPIO ITY: fanoratana ny fichier video
                $videoPath = null;
                if ($request->hasFile("questions.$index.video")) {
                    $file = $request->file("questions.$index.video");
                    $videoName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                    $file->move(public_path('videos/questions'), $videoName);
                    $videoPath = $videoName;
                }

                $question = QcmWebQuestion::create([
                    'qcm_web_id' => $qcmWeb->id,
                    'enonce' => $questionData['enonce'],
                    'image' => $imagePath,
                    'video' => $videoPath, // <-- ovaina, 'video_url' => ... teo aloha
                    'reponse_type' => $questionData['reponse_type'],
                    'points' => $questionData['points'],
                    'ordre' => $index,
                ]);

                if ($questionData['reponse_type'] === 'true_false') {
                    $question->qcmWebChoices()->createMany([
                        ['texte' => 'Vrai', 'est_correcte' => $questionData['vrai_faux_correct'] === 'vrai', 'ordre' => 0],
                        ['texte' => 'Faux', 'est_correcte' => $questionData['vrai_faux_correct'] === 'faux', 'ordre' => 1],
                    ]);
                } else {
                    foreach ($questionData['choices'] as $cIndex => $choice) {
                        if (empty($choice['texte'])) continue;
                        $question->qcmWebChoices()->create([
                            'texte' => $choice['texte'],
                            'est_correcte' => isset($choice['est_correcte']),
                            'ordre' => $cIndex,
                        ]);
                    }
                }
            }
        });

        return redirect()
            ->route('prof.examen.web.qcm.question.index', [$examen->id, $qcmWeb->id])
            ->with('success', 'Questions ajoutées avec succès.');
    }
}
