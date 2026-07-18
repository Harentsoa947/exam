<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichierWeb extends Model
{
    protected $table = 'fichier_webs';

    protected $fillable = ['examen_id', 'titre', 'description', 'note_totale'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function fichierWebQuestions()
    {
        return $this->hasMany(FichierWebQuestion::class);
    }
}
