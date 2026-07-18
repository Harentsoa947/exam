<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $fillable = ['titre', 'description', 'categorie_id', 'duree_minutes', 'status'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // public function typesExercice()
    // {
    //     return $this->belongsToMany(TypeExercice::class, 'examen_type_exercice');
    // }

    public function typesExercice()
    {
        return $this->belongsToMany(TypeExercice::class, 'examen_type_exercice')
            ->withPivot('ordre')
            ->orderBy('examen_type_exercice.ordre');
    }

    public function qcmWebs()
    {
        return $this->hasMany(QcmWeb::class);
    }

    public function pointillerWebs()
    {
        return $this->hasMany(PointillerWeb::class);
    }

    public function reilerWebs()
    {
        return $this->hasMany(RelierWeb::class);
    }

    public function motsCroisesWebs()
    {
        return $this->hasMany(MotsCroisesWeb::class);
    }

    public function fichierWebs()
    {
        return $this->hasMany(FichierWeb::class);
    }

    public function codeWebs()
    {
        return $this->hasMany(CodeWeb::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_examen')
            ->withPivot('termine', 'date_debut', 'date_fin')
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'examen_etudiant', 'examen_id', 'user_id')
                    ->withPivot('termine', 'termine_le', 'date_debut')
                    ->withTimestamps();
    }

}
