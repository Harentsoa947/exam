<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\CodeWeb;
use App\Models\CodeWebQuestion;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfExamenWebCodeQuestionController extends Controller
{
    public function index(Examen $examen, CodeWeb $codeWeb)
    {
        $questions = $codeWeb->codeWebQuestions()
            // ->withCount('reponses')
            ->orderBy('ordre')
            ->get();

        return view('prof.webb.code.question.index', compact('examen', 'codeWeb', 'questions'));
    }

    public function create(Examen $examen, CodeWeb $codeWeb)
    {
        return view('prof.webb.code.question.create', compact('examen', 'codeWeb'));
    }

    public function store(Request $request, Examen $examen, CodeWeb $codeWeb)
    {
        $validated = $request->validate([
            'instruction' => [
                'required',
                'string',
                Rule::unique('code_web_questions', 'instruction')
                    ->where('code_web_id', $codeWeb->id),
            ],
            'langage' => ['required', 'string', 'in:php,javascript,python,html,css,java,c,cpp'],
            'code_starter' => ['nullable', 'string'],
            'points' => ['required', 'numeric', 'min:0.1'],
        ], [
            'instruction.required' => 'L\'instruction est obligatoire.',
            'instruction.unique' => 'Cette instruction existe déjà dans cet exercice.',
            'langage.required' => 'Le langage est obligatoire.',
        ]);

        CodeWebQuestion::create([
            'code_web_id' => $codeWeb->id,
            'instruction' => $validated['instruction'],
            'langage' => $validated['langage'],
            'code_starter' => $validated['code_starter'] ?? null,
            'points' => $validated['points'],
            'ordre' => $codeWeb->codeWebQuestions()->count(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Exercice de code ajouté avec succès.');
    }

    public function edit(Examen $examen, CodeWeb $codeWeb, CodeWebQuestion $question)
    {
        return view('prof.webb.code.question.edit', compact('examen', 'codeWeb', 'question'));
    }

    public function update(Request $request, Examen $examen, CodeWeb $codeWeb, CodeWebQuestion $question)
    {
        $validated = $request->validate([
            'instruction' => [
                'required',
                'string',
                Rule::unique('code_web_questions', 'instruction')
                    ->where('code_web_id', $codeWeb->id)
                    ->ignore($question->id),
            ],
            'langage' => ['required', 'string', 'in:php,javascript,python,html,css,java,c,cpp'],
            'code_starter' => ['nullable', 'string'],
            'points' => ['required', 'numeric', 'min:0.1'],
        ], [
            'instruction.required' => 'L\'instruction est obligatoire.',
            'instruction.unique' => 'Cette instruction existe déjà dans cet exercice.',
        ]);

        $question->update([
            'instruction' => $validated['instruction'],
            'langage' => $validated['langage'],
            'code_starter' => $validated['code_starter'] ?? null,
            'points' => $validated['points'],
        ]);

        return redirect()
            ->route('prof.examen.web.code.question.index', [$examen->id, $codeWeb->id])
            ->with('success', 'Exercice de code modifié avec succès.');
    }

    public function destroy(Examen $examen, CodeWeb $codeWeb, CodeWebQuestion $question)
    {
        $question->delete();

        return redirect()
            ->back()
            ->with('success', 'Exercice de code supprimé.');
    }
}
