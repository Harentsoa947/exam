<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeWeb extends Model
{
    protected $table = 'code_webs';

    protected $fillable = ['examen_id', 'titre', 'description', 'note_totale'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function codeWebQuestions()
    {
        return $this->hasMany(CodeWebQuestion::class);
    }
}
