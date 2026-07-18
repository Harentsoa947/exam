<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QcmWeb extends Model
{
    protected $table = 'qcm_webs';

    protected $fillable = ['examen_id', 'titre', 'description', 'duree_minutes', 'note_totale'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function qcmWebQuestions()
    {
        return $this->hasMany(QcmWebQuestion::class);
    }

}
