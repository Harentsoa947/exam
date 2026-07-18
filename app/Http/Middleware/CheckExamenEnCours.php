<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckExamenEnCours
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $examen = $request->route('examen');
        
        $user = User::find(Auth::id());

        $examenWithPivot = $user->examens()->where('examens.id', $examen->id)->first();

        if (!$examenWithPivot || !$examenWithPivot->pivot->date_debut) {
            abort(403, 'Vous devez d\'abord commencer cet examen.');
        }

        if ($examenWithPivot->pivot->termine) {
            abort(403, 'Cet examen est déjà terminé.');
        }

        $secondesRestantes = now()->diffInSeconds($examenWithPivot->pivot->date_fin, false);

        if ($secondesRestantes <= 0) {
            $user->examens()->updateExistingPivot($examen->id, ['termine' => true]);
            abort(403, 'Le temps est écoulé pour cet examen.');
        }

        // Mizara ny angona ho an'ny view rehetra (layout timer + pejy exercice)
        view()->share('secondesRestantes', $secondesRestantes);
        view()->share('examenPivot', $examenWithPivot->pivot);

        return $next($request);
    }
}
