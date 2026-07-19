<?php
namespace App\Services;

use Illuminate\Support\Facades\Session;

class GestionnaireSujet
{
    private $sessionKey = 'sujet_en_cours';

    public function __construct()
    {
        // Si la session n'existe pas encore, on l'initialise avec un tableau vide
        if (!Session::has($this->sessionKey)) {
            Session::put($this->sessionKey, [
                'qcm' => [],
                'relier_par_fleche' => [],
                'mots_croises' => [],
                'comprehension' => [],
                'pendule' => [],
                'redaction' => []
            ]);
        }
    }

    public function set_qcm(array $questions)
    {
        $sujet = Session::get($this->sessionKey);
        
        // On stocke ou on fusionne les questions
        foreach ($questions as $question) {
            $sujet['qcm'][] = $question;
        }
        
        Session::put($this->sessionKey, $sujet);
    }


    public function set_relier_fleche(array $couples)
    {
        $sujet = Session::get($this->sessionKey);
        // foreach ($couples as $question) {
        //     $sujet['relier_par_fleche'][] = $question;
        // }
        $sujet['relier_par_fleche'][] = $couples;
        Session::put($this->sessionKey, $sujet);
    }


    public function set_mots_croises(array $donneesGrille)
    {
        $sujet = Session::get($this->sessionKey);
        foreach ($donneesGrille as $question) {
            $sujet['mots_croises'][] = $question;
        }
        // $sujet['mots_croises'] = $donneesGrille;
        Session::put($this->sessionKey, $sujet);
    }

    public function set_comprehension(array $donnees)
    {
        $sujet = Session::get($this->sessionKey);
        foreach ($donnees as $question) {
            $sujet['comprehension'][] = $question;
        }
        // $sujet['comprehension'] = $donnees;
        Session::put($this->sessionKey, $sujet);
    }

    public function set_pendule(array $donnees)
    {
        $sujet = Session::get($this->sessionKey);
        foreach ($donnees as $question) {
            $sujet['pendule'][] = $question;
        }
        // $sujet['pendule'] = $donnees;
        Session::put($this->sessionKey, $sujet);
    }

    public function set_redaction(array $donnees)
    {
        $sujet = Session::get($this->sessionKey);
        foreach ($donnees as $question) {
            $sujet['redaction'][] = $question;
        }
        // $sujet['redaction'] = $donnees;
        Session::put($this->sessionKey, $sujet);
    }

    /**
     * Récupère toutes les questions actuellement stockées en mémoire tampon
     */
    public function get_qcm(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['questions'] ?? [];
    }

    public function get_relier_fleche(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['relier_par_fleche'] ?? [];
    }

    public function get_mots_croises(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['mots_croises'] ?? [];
    }

    public function get_comprehension(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['comprehension'] ?? [];
    }

    public function get_pendule(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['pendule'] ?? [];
    }

    public function get_redaction(): array
    {
        $sujet = Session::get($this->sessionKey);
        return $sujet['redaction'] ?? [];
    }

    /**
     * Vide la mémoire tampon une fois que tout est inséré en BDD
     */
    public function vider()
    {
        Session::forget($this->sessionKey);
    }
}