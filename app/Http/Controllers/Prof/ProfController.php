<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Services\GestionnaireSujet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function prof(Request $req)
    {
        if(!$req->session()->has('proffesseur')){
            return view('/auth/login');
        }
        // dd(session('proffesseur')['id']);
        // dd(session('proffesseur'));
        $prof_id = session('proffesseur')['id'];
        $prof_category = session('proffesseur')['category_id'];
        $examen = DB::table('examen')
            ->join('categories', 'examen.category_id', '=', 'categories.id')
            ->where('prof_id', $prof_id)
            ->where('category_id', $prof_category)
            ->select('examen.*', 'categories.*')
            ->get();
        // dd($examen);
        return view('prof/prof', compact('examen'));
    }

    public function creation_sujet(Request $req)
    {
        // $req->session()->flush();
        // dd(session('sujet_en_cours'));
        // dd(session('proffesseur'));
        if(!$req->session()->has('proffesseur')){
            return redirect('/');
        }
        return view('prof/creation_sujet');
    }
    public function sujet_qcm(Request $req)
    {
        if(!$req->session()->has('proffesseur')){
            return redirect('/');
        }
        $prof_id = session('proffesseur')['id'];
        return view('prof/sujet_qcm', compact('prof_id'));
    }
    public function post_qcm(Request $req)
    {
        // choix multiple vraie : manomboka index 0
        if(!$req->session()->has('proffesseur')){
            return redirect('/');
        }
        // 1. Validation de base de la structure
        $req->validate([
            'total' => 'required|integer|min:1|max:20',
            'questions' => 'required|array',
            'questions.*.points' => 'required|integer|min:1',
            'questions.*.text_question' => 'required|string|min:10|max:130',
            'questions.*.mult_bool' => 'required|in:mult,bool',
            'questions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2Mo max pour l'image
        ], [
            'total.required' => 'Le nombre total de questions est requis.',
            'questions.required' => 'Veuillez configurer au moins une question.',
            'questions.*.points.required' => "La question :position n'a pas de points définis.",
            'questions.*.text_question.required' => "Le texte de la question :position est vide.",
            'questions.*.text_question.min' => "Question :position : le texte doit faire au moins 10 caractères.",
            'questions.*.text_question.max' => "Question :position : le texte ne doit pas dépasser 130 caractères.",
            'questions.*.mult_bool.required' => "Question :position : veuillez choisir un type de réponse.",
        ]);

        // 2. Validation poussée selon le type de question sélectionné
        foreach($req->input('questions') as $i => $question) {
            if ($question['mult_bool'] === 'mult') {
                $req->validate([
                    "questions.$i.choix_multiple" => 'required|integer|between:2,4',
                    "questions.$i.proposition" => 'required|array|min:2',
                    "questions.$i.proposition.*" => 'required|string',
                    "questions.$i.bonne_reponse_mult" => 'required|integer',
                ], [
                    "questions.$i.choix_multiple.required" => "Question $i : Sélectionnez le nombre de propositions.",
                    "questions.$i.proposition.*.required" => "Question $i : Toutes les propositions doivent être remplies.",
                    "questions.$i.bonne_reponse_mult.required" => "Question $i : Vous devez cocher la bonne réponse.",
                ]);
            } elseif ($question['mult_bool'] === 'bool') {
                $req->validate([
                    "questions.$i.bonne_reponse_bool" => 'required|in:vrai,faux',
                ], [
                    "questions.$i.bonne_reponse_bool.required" => "Question $i : Sélectionnez si la réponse est Vraie ou Fausse.",
                ]);
            }
        }

        // Si on arrive ici, tout est validé avec succès !
        $donneesValides = $req->all();
        
        // C'est ici que tu pourras coder ton insertion en base de données.
        // dd($donneesValides);


        $gestionnaire = new GestionnaireSujet();
        $gestionnaire->set_qcm($req->input('questions'));

        return redirect()->back()->with('success', 'Le QCM a été enregistré avec succès !');
    }
    public function relier_fleche()
    {
        return view('prof/relier_fleche');
    }

    public function post_relier_fleche(Request $req)
    {
        // 1. Validation des données reçues du formulaire dynamique
        $req->validate([
            'couples'          => 'required|array|min:1|max:5',
            'couples.*.gauche' => 'required|string|max:255',
            'couples.*.droite' => 'required|string|max:255',
        ], [
            'couples.required'          => 'Veuillez ajouter au moins un couple à relier.',
            'couples.*.gauche.required' => 'Tous les éléments de la colonne gauche doivent être saisis.',
            'couples.*.droite.required' => 'Tous les éléments de la colonne droite doivent être saisis.',
        ]);

        // 2. Initialisation du gestionnaire de session
        $gestionnaire = new GestionnaireSujet();

        // 3. Stockage en session
        $gestionnaire->set_relier_fleche($req->input('couples'));

        // 4. Redirection avec un message de succès
        return redirect()->back()->with('success', 'Exercice "Relier par flèche" enregistré temporairement !');
    }

    public function mots_croises()
    {
        return view('prof/mots_croises');
    }
    
    public function post_mots_croises(Request $req)
    {
        // 1. Validation de la structure globale
        $req->validate([
            'nbr_ligne'   => 'required|integer|min:2|max:15',
            'nbr_colonne' => 'required|integer|min:2|max:15',
            'grille'      => 'required|array',
        ], [
            'nbr_ligne.required'   => 'Le nombre de lignes est obligatoire.',
            'nbr_colonne.required' => 'Le nombre de colonnes est obligatoire.',
            'grille.required'      => 'Veuillez générer et remplir la grille.',
        ]);

        // 2. Validation poussée de chaque cellule (chaque cellule doit être remplie ou définie comme case noire)
        $grille = $req->input('grille');
        foreach ($grille as $l => $colonnes) {
            foreach ($colonnes as $c => $valeur) {
                // Si la case n'est pas noire et qu'elle est vide/uniquement des espaces
                if ($valeur !== 'XX' && trim($valeur) === '') {
                    return redirect()->back()
                        ->withErrors(["grille" => "Remplissez tous les cases"])
                        ->withInput();
                }
            }
        }

        // 3. Sauvegarde dans le Gestionnaire de Session
        $gestionnaire = new GestionnaireSujet();
        $gestionnaire->set_mots_croises([
            'lignes'   => $req->input('nbr_ligne'),
            'colonnes' => $req->input('nbr_colonne'),
            'donnees'  => $grille
        ]);

        return redirect()->back()->with('success', 'Grille de mots croisés enregistrée temporairement !');
    }

    public function pendule()
    {
        return view('prof/pendule');
    }

    public function pendule_post(Request $req)
    {
        $req->validate([
            'mots' => 'required|max:20',
            'indice' => 'required'
        ]);

        $gestionnaire = new GestionnaireSujet();
        $gestionnaire->set_pendule([
            'mots' => $req->input('mots'),
            'indice' => $req->input('indice')
        ]);

        return redirect()->back()->with('success', 'Sujet pendule ajouter avec succées');
    }

    public function redaction()
    {
        return view('prof/redaction');
    }
    public function comprehension()
    {
        return view('prof/comprehension');
    }

    public function redaction_post(Request $req)
    {
        $req->validate([
            'question_redaction' => 'required',
            'points' => 'required',
            'max_mots' => 'required'
        ]);
        $gestionnaire = new GestionnaireSujet();
        $gestionnaire->set_redaction([
            'question_redaction' => $req->input('question_redaction'),
            'points' => $req->input('points'),
            'max_mots' => $req->input('max_mots')
        ]);
        return redirect()->back()->with('success', 'Sujet du rédaction ajouter avec succées');
    }

    public function comprehension_post(Request $req)
    {
        $req->validate([
            'points' => 'required|numeric|decimal:0,2|max:20',
            'titre_comprehension' => 'required|max:50',
            'texte_comprehension' => 'required|min:30',
            'nbr_question' => 'required|numeric|decimal:0,2|max:5',
            'question_comprehension.*' => 'required|min:13|max:40',
            'reponse_comprehension.*' => 'required|min:3|max:40'
        ], [
            'points.required' => 'Définissez le point',
            'points.numeric' => 'Le point doit être une nombre',
            'points.decimal' => 'Maximum de caractères accéptée : 20',
            'points.max' => 'Maximum de caractères accéptée : 20',
            'titre_comprehension.required' => 'Veuillez remplir le titre',
            'titre_comprehension.max' => 'Le titre est trop long (maximum accepté : 50 caractères)',
            'texte_comprehension.required' => 'Veuillez entrer ou coller le texte',
            'texte_comprehension.min' => 'Le texte est trop court (minimum accepté : 30)',
            'nbr_question.required' => 'Les questions sont requisent',
            'nbr_question.numeric' => 'Le nombre des questions réponses sont requisent',
            'nbr_question.decimal' => 'Nombre de question trop long',
            'nbr_question.max' => 'Nombre de question trop long',
            'question_comprehension.*.required' => 'Remplissez tous les questions',
            'question_comprehension.*.min' => 'Questions du compréhension: minimum de caractères : 13',
            'question_comprehension.*.max' => 'Questions du compréhension: maximum de caractères : 40',
            'reponse_comprehension.*.required' => 'Remplissez tous les réponses',
            'reponse_comprehension.*.min' => 'Réponses du compréhension: minimum de caractères : 3',
            'reponse_comprehension.*.max' => 'Réponses du compréhension: maximum de caractères : 40'
        ]);

        // Sauvegadre dans le Gestionnaire de Session
        // dd($req->all());
        $gestionnaire = new GestionnaireSujet();
        $gestionnaire->set_comprehension([
            'points' => $req->input('points'),
            'titre_comprehension' => $req->input('titre_comprehension'),
            'texte_comprehension' => $req->input('texte_comprehension'),
            'nbr_question' => $req->input('nbr_question'),
            'question_comprehension' => $req->input('question_comprehension'),
            'reponse_comprehension' => $req->input('reponse_comprehension')
        ]);

        return redirect()->back()->with('success', 'Sujet pour la compréhension du texte a bien été ajouté');
    }

    public function info_examen()
    {
        return view('prof/info_examen');
    }

    // vue global
    public function vue_qcm(Request $req)
    {
        // sujet qcm base + session
        $session_qcm = "";
        $professeurs = "";
        dd(session('sujet_en_cours'));
        if($req->session()->has('sujet_en_cours') && $req->session()->has('proffesseur')){
            $professeurs = collect();
            $sujet = session('sujet_en_cours');
            $session_qcm = $sujet['qcm'] ?? [];

            $profIds = collect($session_qcm)->pluck('prof')->unique()->filter();
            $professeurs = DB::table('utilisateurs')->where('id', $profIds)->first();
        }

        // dd($professeurs);
        

        // dd($session_qcm);
        // dd($req->session('professeurs'));

        


        return view('prof/vue_global/qcm_vue', compact('session_qcm', 'professeurs'));
    }

    public function vue_relier_fleche()
    {
        return view('prof/vue_global/relier_fleche_vue');
    }
}
