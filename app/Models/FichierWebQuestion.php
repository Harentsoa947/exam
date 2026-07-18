<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichierWebQuestion extends Model
{
    protected $table = 'fichier_web_questions';

    protected $fillable = ['fichier_web_id', 'instruction', 'fichier_prof', 'points', 'ordre'];

    public function fichierWeb()
    {
        return $this->belongsTo(FichierWeb::class);
    }

    // public function reponses()
    // {
    //     return $this->hasMany(FichierWebReponse::class);
    // }
}
