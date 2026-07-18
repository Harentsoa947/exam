<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {

        $categories = Categorie::all();
        $students = User::where('role', 'student')
        ->with('student.categorie')
        ->when($request->filled('categorie_id'), function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('categorie_id', $request->categorie_id);
            });
        })
        ->latest()
        ->paginate(10);

        return view('admin.student.index', compact('students','categories'));
    }

    public function create()
    {
        $categories = Categorie::all();

        return view('admin.student.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', Password::min(6)],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'], // 2MB max
        ]);


        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'image' => $imageName, 
        ]);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Etudiant créé avec succès');
    }
    //ajouter categorie
    public function assignCategorie(User $student)
    {    
        $categories = Categorie::all();
        return view('admin.student.assign-categorie', compact('student', 'categories'));
    }

    public function storeCategorie(Request $request, User $student)
    {
        $validated = $request->validate([
            'matricule' => ['required', 'string', 'digits:6', 'unique:students,matricule'],
            'categorie_id' => ['required', 'exists:categories,id'],
        ], [
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.digits' => 'Le matricule doit contenir exactement 10 chiffres.',
            'matricule.unique' => 'Ce matricule est déjà utilisé par un autre étudiant.',
            'categorie_id.required' => 'Veuillez sélectionner une catégorie.',
            'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
        ]);

        Student::updateOrCreate(
            ['user_id' => $student->id],
            [
                'matricule' => $validated['matricule'],
                'categorie_id' => $validated['categorie_id'],
            ]
        );

        return redirect()
            ->route('admin.student.index')
            ->with('success',  $student->name . 'est ajouté dans un damine d\'examen!' );
    }

    //supprimer
    public function destroy(User $student)
    {
        // effacer l'image dans images/..
        if ($student->image && file_exists(public_path('images/' . $student->image))) {
            unlink(public_path('images/' . $student->image));
        }

        $student->delete();

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Etudiant effacé avec succes.');
    }
    //detail d'un etudiant
    public function show(User $student)
    {
        $student->load('student.categorie');
    
        return view('admin.student.show', compact('student'));
    }
    
}
