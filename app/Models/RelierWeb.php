<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelierWeb extends Model
{
    protected $table = 'relier_webs';

    protected $fillable = ['examen_id', 'titre', 'description', 'note_totale'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function relierWebQuestions()
    {
        return $this->hasMany(RelierWebQuestion::class);
    }
    
}
