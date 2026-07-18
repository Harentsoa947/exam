<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Examen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamenController extends Controller
{
    public function index(string $slug)
    {
        $categorie = Categorie::where('slug', $slug)->firstOrFail();

        $studentProfile = Auth::user()->student;

        if (!$studentProfile) {
            abort(403, 'Aucun profil étudiant associé.');
        }

        $user = User::find(Auth::id());

        $examen = $user->examens()
            ->where('categorie_id', $studentProfile->categorie_id)
            ->where('status', 'publie')
            ->wherePivot('termine', false)
            ->withCount('typesExercice')
            ->orderBy('examens.created_at')
            ->first();

        return view('student.examen.index', compact('categorie', 'examen'));
    }

    public function start(Examen $examen)
    {
         $user = User::find(Auth::id());

        $pivot = $user->examens()->where('examens.id', $examen->id)->first()?->pivot;

        if (!$pivot) {
            abort(403, 'Vous n\'êtes pas assigné(e) à cet examen.');
        }

        if (!$pivot->date_debut) {
            $user->examens()->updateExistingPivot($examen->id, [
                'date_debut' => now(),
                'date_fin' => now()->addMinutes($examen->duree_minutes),
            ]);
        }

        return redirect()->route('student.examen.first', $examen->id);
    }

}
