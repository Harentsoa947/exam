<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QcmWebQuestion extends Model
{
    protected $table = 'qcm_web_questions';

    protected $fillable = [
        'qcm_web_id', 'enonce', 'image', 'video',
        'reponse_type', 'points', 'ordre',
    ];

    public function qcmWeb()
    {
        return $this->belongsTo(QcmWeb::class);
    }

    public function qcmWebchoices()
    {
        return $this->hasMany(QcmWebChoice::class, 'qcm_web_question_id');
    }
}
