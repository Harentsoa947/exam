<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointillerWebChoice extends Model
{
    protected $table = 'pointiller_web_choices';

    protected $fillable = ['pointiller_web_reponse_id', 'texte'];

    public function reponse()
    {
        return $this->belongsTo(PointillerWebReponse::class, 'pointiller_web_reponse_id');
    }
}
