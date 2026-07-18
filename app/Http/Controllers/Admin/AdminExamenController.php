<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Examen;
use Illuminate\Http\Request;

class AdminExamenController extends Controller
{
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.examen.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'categorie_id' => ['required', 'exists:categories,id'],
            'duree_minutes' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', 'in:brouillon,publie,archive'],
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'categorie_id.required' => 'Veuillez sélectionner une catégorie.',
            'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
            'duree_minutes.integer' => 'La durée doit être un nombre entier.',
        ]);

        Examen::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Examen créé avec succès.');
    }

    
    public function destroy(Examen $examen)
    {
        $examen->delete();

        return redirect()
            ->back()
            ->with('success', 'Examen supprimé.');
    }

}
