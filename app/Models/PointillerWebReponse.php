<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointillerWebReponse extends Model
{
    protected $table = 'pointiller_web_reponses';

    protected $fillable = ['pointiller_web_question_id', 'position', 'reponse_correcte'];

    public function question()
    {
        return $this->belongsTo(PointillerWebQuestion::class, 'pointiller_web_question_id');
    }

    public function choices()
    {
        return $this->hasMany(PointillerWebChoice::class, 'pointiller_web_reponse_id');
    }
}
