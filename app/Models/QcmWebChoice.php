<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QcmWebChoice extends Model
{
    protected $table = 'qcm_web_choices';

    protected $fillable = ['qcm_web_question_id', 'texte', 'est_correcte', 'ordre'];

    protected $casts = [
        'est_correcte' => 'boolean',
    ];

    public function qcmWebQuestion()
    {
        return $this->belongsTo(QcmWebQuestion::class, 'qcm_web_question_id');
    }
}
