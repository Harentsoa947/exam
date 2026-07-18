<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\RelierWeb;
use App\Models\RelierWebQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfExamenWebFlecheQuestionController extends Controller
{
    public function index(Examen $examen, RelierWeb $relierWeb)
    {
        $questions = $relierWeb->relierWebQuestions()
            ->with('paires')
            ->orderBy('id', 'desc')
            ->get();

        return view('prof.webb.fleche.question&reponse.index',
            compact('examen', 'relierWeb', 'questions')
        );
    }

    public function create(Examen $examen, RelierWeb $relierWeb)
    {
        return view('prof.webb.fleche.question&reponse.create', 
        compact('examen','relierWeb'));
    }

    public function store(Request $request, Examen $examen, RelierWeb $relierWeb)
    {
        $request->validate([
            'enonce' => [
                'required',
                'string',
                Rule::unique('relier_web_questions', 'enonce')
                    ->where(fn ($query) => $query->where('relier_web_id', $relierWeb->id)),
            ],
            'points' => 'required|numeric|min:0',
            'ordre' => 'required|integer',

            'element_gauche.*' => 'required|string',
            'element_droit.*' => 'required|string',
            'order_left.*' => 'required|integer',
            'order_right.*' => 'required|integer',
        ]);

        if (count($request->element_left) !== count(array_unique($request->element_left))) {
            return back()
                ->withInput()
                ->withErrors([
                    'element_gauche' => 'Tsy mahazo misy élément gauche miverimberina ao anatin\'ity question ity.'
                ]);
        }

        if (count($request->element_right) !== count(array_unique($request->element_right))) {
            return back()
                ->withInput()
                ->withErrors([
                    'element_droit' => 'Tsy mahazo misy élément droite miverimberina ao anatin\'ity question ity.'
                ]);
        }

        DB::transaction(function () use ($request, $relierWeb) {

            $question = $relierWeb->relierWebQuestions()->create([
                'enonce' => $request->enonce,
                'points' => $request->points,
                'ordre' => $request->ordre,
            ]);

            foreach ($request->element_gauche as $index => $gauche) {

                $question->paires()->create([
                    'element_left' => $gauche,
                    'element_right' => $request->element_droit[$index],
                    'order_left' => $request->order_left[$index],
                    'order_right' => $request->order_right[$index],
                ]);
            }

        });

        return redirect()->back()->with('success','Question enregistrée');
    }


    public function destroy(Examen $examen, RelierWeb $relierWeb, RelierWebQuestion $question)
    {
        $question->delete();
        return redirect()->back()
                        ->with('success', 'Qustion supprimer avec succes!');
    }
}
