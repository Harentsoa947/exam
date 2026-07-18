<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointillerWeb extends Model
{
    protected $table = 'pointiller_webs';

    protected $fillable = ['examen_id', 'titre', 'description', 'duree_minutes', 'note_totale'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function pointillerWebQuestions()
    {
        return $this->hasMany(PointillerWebQuestion::class);
    }
}
